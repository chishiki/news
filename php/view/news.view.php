<?php

final class NewsView {

	private $loc;
	private $input;
	private $modules;
	private $errors;
	private $messages;

	public function __construct($loc = array(), $input = array(), $modules = array(), $errors = array(), $messages = array()) {

		$this->loc = $loc;
		$this->input = $input;
		$this->modules = $modules;
		$this->errors = $errors;
		$this->messages = $messages;

	}

	public function newsList() {

		$arg = new NewsListParameter();

		$body = '

			<div class="row">
				<div class="col-12 col-sm-6 offset-sm-6 col-md-3 offset-md-9 col-lg-2 offset-lg-10">
					<a href="/' . Lang::prefix() . 'news/admin/create/" class="btn btn-block btn-outline-success">' . Lang::getLang('create') . '</a>
				</div>
			</div>

			<div class="table-container mt-2">

				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover table-sm">
						<thead class="thead-light">
							<tr>
								<th scope="col" class="text-center">' . Lang::getLang('newsID') . '</th>
								<th scope="col" class="text-center">' . Lang::getLang('newsDate') . '</th>
								<th scope="col" class="text-center">' . Lang::getLang('newsTitle') . '</th>
								<th scope="col" class="text-center">' . Lang::getLang('action') . '</th>
							</tr>
						</thead>
						<tbody>' . $this->newsListRows($arg) . '</tbody>
					</table>
				</div>
			</div>

	';

		$card = new CardView('news_list',array('container'),'',array('col-12'),Lang::getLang('newsList'),$body);
		return $card->card();

	}

	public function newsForm($type, $newsID = null) {

		$news = new News($newsID);
		$site = new Site($_SESSION['siteID']);

		if (!empty($this->input)) {
			foreach($this->input AS $key => $value) { if(isset($news->$key)) { $news->$key = $value; } }
		}

		$form = '

			<form method="post" action="/' . Lang::prefix() . 'news/admin/' . $type . '/' . ($newsID?$newsID.'/':'') . '">
				
				' . ($newsID?'<input type="hidden" name="newsID" value="' . $newsID . '">':'') . '
			
				<div class="form-row">
				
					<div class="form-group col-12 col-sm-6 col-md-4">
						<label for="newsDate">' . Lang::getLang('newsDate') . '</label>
						<div class="input-group">
							<div class="input-group-prepend"><div class="input-group-text"><span class="far fa-calendar-alt"></span></div></div>
							<input type="date" class="form-control" name="newsDate" value="' . $news->newsDate . '" required>
						</div>
					</div>

				</div>
				
				<hr />
				
				<div class="row">
				
					<div class="col-12 col-md-6">
					
						<div class="form-row">
				
							<div class="form-group col-12">
								<label for="newsTitleEnglish">' . Lang::getLang('newsTitleEnglish') . '</label>
								<input type="text" class="form-control" name="newsTitleEnglish" value="' . $news->newsTitleEnglish . '">
							</div>
							
						</div>
		
						<div class="form-row">
						
							<div class="form-group col-12">
								<label for="newsContentEnglish">' . Lang::getLang('newsContentEnglish') . '</label>
								<textarea id="news_form_content_japanese" class="form-control" name="newsContentEnglish">' . $news->newsContentEnglish . '</textarea>
							</div>
		
						</div>
					
					</div>
					
					<div class="col-12 col-md-6">
					
						<div class="form-row">
				
							<div class="form-group col-12">
								<label for="newsTitleJapanese">' . Lang::getLang('newsTitleJapanese') . '</label>
								<input type="text" class="form-control" name="newsTitleJapanese" value="' . $news->newsTitleJapanese . '">
							</div>
							
						</div>
		
						<div class="form-row">
						
							<div class="form-group col-12">
								<label for="newsContentJapanese">' . Lang::getLang('newsContentJapanese') . '</label>
								<textarea id="news_form_content_japanese" class="form-control" name="newsContentJapanese">' . $news->newsContentJapanese . '</textarea>
							</div>
		
						</div>
					
					</div>
				
				</div>

				<hr />
				
				<div class="form-row">
				
					<div class="form-group col-12 col-xl-8">
						<label for="newsURL">' . Lang::getLang('newsURL') . ' (' . Lang::getLang('alphanumericHyphenOnly') . ')</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text"><span class="d-none d-md-inline">https://' . $site->siteURL . '</span>/' . Lang::prefix() . 'news/</div>
							</div>
							<input type="text" class="form-control" name="newsURL" value="' . $news->newsURL . '" required>
							<div class="input-group-append"><div class="input-group-text">/</div></div>
						</div>
					</div>

				</div>
				
				<hr />

				<div class="form-row">
				
					<div class="form-group col-12 col-sm-4 col-md-3">
						<a href="/' . Lang::prefix() . 'news/admin/" class="btn btn-block btn-outline-secondary" role="button">' . Lang::getLang('returnToList') . '</a>
					</div>
					
					<div class="form-group col-12 col-sm-4 col-md-3 offset-md-3">
						<button type="submit" name="news-' . $type . '" class="btn btn-block btn-outline-'. ($type=='create'?'success':'primary') . '">' . Lang::getLang($type) . '</button>
					</div>
					
					<div class="form-group col-12 col-sm-4 col-md-3">
						<a href="/' . Lang::prefix() . 'news/admin/" class="btn btn-block btn-outline-secondary" role="button">' . Lang::getLang('cancel') . '</a>
					</div>
					
				</div>

			</form>

		';

		$header = Lang::getLang('news'.ucfirst($type));
		$card = new CardView('news_'.$type, array('container'), '', array('col-12'), $header, $form);
		return $card->card();

	}

	public function newsConfirmDelete($newsID) {

		$news = new News($newsID);

		$form = '

			<form id="news_form_delete" method="post" action="/' . Lang::prefix() . 'news/admin/delete/' . $newsID . '/">
				
				<input type="hidden" name="newsID" value="' . $newsID . '">

				<div class="form-row">
				
					<div class="form-group col-12 col-sm-8 col-md-6">
						<label for="newsTitleEnglish">' . Lang::getLang('newsTitleEnglish') . '</label>
						<input type="text" class="form-control" value="' . $news->newsTitleEnglish . '" disabled>
					</div>

				</div>
				
				<div class="form-row">
				
					<div class="form-group col-12">
						<label for="newsContentEnglish">' . Lang::getLang('newsContentEnglish') . '</label>
						<textarea class="form-control" disabled>' . $news->newsContentEnglish . '</textarea>
					</div>

				</div>
				
				<hr />
				
				<div class="form-row">
				
					<div class="form-group col-12 col-sm-8 col-md-6">
						<label for="newsTitleJapanese">' . Lang::getLang('newsTitleJapanese') . '</label>
						<input type="text" class="form-control" value="' . $news->newsTitleJapanese . '" disabled>
					</div>

				</div>
				
				<hr />
				
				<div class="form-row">
				
					<div class="form-group col-12">
						<label for="newsContentJapanese">' . Lang::getLang('newsContentJapanese') . '</label>
						<textarea class="form-control" disabled>' . $news->newsContentJapanese . '</textarea>
					</div>

				</div>

				<div class="form-row">
				
					<div class="form-group col-6 col-md-3 offset-md-6">
						<button type="submit" name="news-confirm-delete" class="btn btn-block btn-outline-danger">' . Lang::getLang('delete') . '</button>
					</div>
					
					<div class="form-group col-6 col-md-3">
						<a href="/' . Lang::prefix() . 'news/admin/" class="btn btn-block btn-outline-secondary" role="button">' . Lang::getLang('cancel') . '</a>
					</div>
					
				</div>
				
			</form>
		';

		$header = Lang::getLang('newsConfirmDelete').' ['. $news->newsTitle() .']';
		$card = new CardView('news_confirm_delete',array('container'),'',array('col-12'),$header,$form);
		return $card->card();

	}

	public function newsLinkList() {

		$newsList = '<div id="news_list" class="container mt-3">';
		$newsList .= '<h3 class="news-h">' .  Lang::getLang('recentNews') . '</h3>';

		$hnlp = new NewsListParameter();
		$hnl = new NewsList($hnlp);
		$newsItems = $hnl->news();
		foreach ($newsItems AS $newsID) {
			$news = new News($newsID);
			$newsList .= '
				<div class="news-list-item row clickable" data-url="/' . Lang::prefix() . 'news/' . $news->newsURL . '/">
					<div class="news-list-item-date col-12 col-md-3 col-lg-2">' . $news->newsDate . '</div>
					<div class="news-list-item-title col-12 col-md-9 col-lg-10">' . $news->newsTitle() . '</a></div>
				</div>
			';
		}

		$newsList .= '</div>';

		return $newsList;

	}

	public function newsView($newsID) {

		$news = new News($newsID);
		$newsContent = nl2br(htmlentities($news->newsContent()),true);
		$title = $news->newsTitle();
		$card = new CardView('news_view_'.$newsID, array('container-fluid'), '', array('col-12'), $title, $newsContent, false);
		return $card->card();

	}

	private function newsListRows(NewsListParameter $arg) {

		$newsList = new NewsList($arg);
		$news = $newsList->news();

		$rows = '';

		foreach ($news AS $newsID) {

			$news = new News($newsID);

			$rows .= '
				<tr id="news_id_' . $newsID . '" class="news-list-row">
					<th scope="row" class="text-center">' . $newsID . '</th>
					<td class="text-center">' . $news->newsDate . '</td>
					<td class="text-left">' . $news->newsTitle() . '</td>
					<td class="text-center text-nowrap">
						<a href="/' . Lang::prefix() . 'news/admin/update/' . $newsID . '/" class="btn btn-sm btn-outline-primary">' . Lang::getLang('update') . '</a>
						<a href="/' . Lang::prefix() . 'news/admin/confirm-delete/' . $newsID . '/" class="btn btn-sm btn-outline-danger">' . Lang::getLang('delete') . '</a>
					</td>
				</tr>
			';

		}

		return $rows;

	}

}

?>