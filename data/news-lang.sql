SET @now := now();

REPLACE INTO perihelion_Lang VALUES ('newsTitleEnglish', 'Title (English)', 0, '題名(英語)', 0, @now);
REPLACE INTO perihelion_Lang VALUES ('newsContentEnglish', 'Content (English)', 0, '内容(英語)', 0, @now);
REPLACE INTO perihelion_Lang VALUES ('newsTitleJapanese', 'Title (Japanese)', 0, '題名(日本語)', 0, @now);
REPLACE INTO perihelion_Lang VALUES ('newsContentJapanese', 'Content (Japanese)', 0, '内容(日本語)', 0, @now);
REPLACE INTO perihelion_Lang VALUES ('newsTitle', 'Title', 0, '題名', 0, @now);
REPLACE INTO perihelion_Lang VALUES ('newsContent', 'Content', 0, '内容', 0, @now);
REPLACE INTO perihelion_Lang VALUES ('thereWasAProblemCreatingYourNews', 'There was a problem adding your news.', 0, 'エラーが発生して、ニュースが追加されなかったです。', 0, @now);
REPLACE INTO perihelion_Lang VALUES ('thereWasAProblemUpdatingYourNews', 'There was a problem updating your news.', 0, 'エラーが発生して、ニュースが更新されなかったです。', 0, @now);
REPLACE INTO perihelion_Lang VALUES ('thereWasAProblemDeletingYourNews', 'There was a problem deleting your news.', 0, 'エラーが発生して、ニュースが削除されなかったです。', 0, @now);
REPLACE INTO perihelion_Lang VALUES ('newsUpdateSuccessful', 'News was successfully updated.', 0, 'ニュースが更新されました。', 0, @now);
REPLACE INTO perihelion_Lang VALUES ('newsDeleteSuccessful', 'News was successfully deleted.', 0, 'ニュースが削除されました。', 0, @now);
REPLACE INTO perihelion_Lang VALUES ('newProducts', 'New Products', 0, 'New Products', 0, @now);
REPLACE INTO perihelion_Lang VALUES ('recentNews', 'Recent News', 0, '最新情報', 0, @now);
REPLACE INTO perihelion_Lang VALUES ('newsUrlAlreadyExists', 'URL already in use.', 0, '入力されたURLは既に使われています。', 0, @now);
REPLACE INTO perihelion_Lang VALUES ('newsUrlAlreadyUsedByAnotherNewsItem', 'URL already in use by another news item.', 0, '入力されたURLは別の記事で使われています。', 0, @now);
REPLACE INTO perihelion_Lang VALUES ('newsUrlMustBeSet', 'The URL must be set.', 0, 'URLの入力は必須です。', 0, @now);
REPLACE INTO perihelion_Lang VALUES ('newsURL', 'URL', 0, 'URL', 0, @now);
REPLACE INTO perihelion_Lang VALUES ('newsDate', 'Date', 0, '日付', 0, @now);
REPLACE INTO perihelion_Lang VALUES ('newsUpdate', 'News Update', 0, 'ニュース更新', 0, @now);
REPLACE INTO perihelion_Lang VALUES ('newsCreate', 'News Create', 0, 'ニュース新規作成', 0, @now);
REPLACE INTO perihelion_Lang VALUES ('newsList', 'News List', 0, 'ニュース一覧', 0, @now);
REPLACE INTO perihelion_Lang VALUES ('newsID', 'ID', 0, 'ID', 0, @now);
REPLACE INTO perihelion_Lang VALUES ('alphanumericHyphenOnly', 'Alphanumeric and Hyphens only', 0, '英数字とハイフンのみ', 0, @now);
REPLACE INTO perihelion_Lang VALUES ('onlyAlphanumericAndHyphenInputAreAllowedInTheUrlField', 'Only alphanumeric characters and hyphens are allowed in the URL field.', 0, 'URLには英数字とハイフンしか入力出来ないです。', 0, @now);

-- REPLACE INTO perihelion_Lang VALUES ('xxxxxxx', 'xxxxxxx', 0, 'xxxxxxx', 0, @now);

