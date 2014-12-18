# Setting up news extension
plugin.tx_news {
	view {
		templateRootPaths.100 = {$tmplVoltearte.view.templateRootPath}News/
		partialRootPaths.100 = {$tmplVoltearte.view.partialRootPath}News/
		layoutRootPaths.100 = {$tmplVoltearte.view.layoutRootPath}News/
	}
	settings {
		cssFile >
		backPid = {$tmplVoltearte.settings.news.backPid}
		link.skipControllerAndAction = 1
		cropMaxCharacters = 270
		facebookLocale = es_ES
		list {
			paginate {
				itemsPerPage = 100
				insertAbove = FALSE
			}
			media.image {
				maxWidth = 300
				maxHeight = 300
			}
		}
	}
}

lib.news = USER
lib.news {
	userFunc = tx_extbase_core_bootstrap->run
	pluginName = Pi1
	extensionName = News
	controller = News
	settings =< plugin.tx_news.settings
	persistence =< plugin.tx_news.persistence
	view =< plugin.tx_news.view
}

lib.news_list < lib.news
lib.news_list {
	action = list
	switchableControllerActions.News.1 = list
	settings.categoryConjunction = 3
}

[globalVar = TSFE:id = 17] || [globalVar = TSFE:id = 51]
	lib.news_list.settings.categories = 1
[end]

[globalVar = TSFE:id = 25] || [globalVar = TSFE:id = 53]
	lib.news_list.settings.categories = 2
[end]

[globalVar = TSFE:id = 21] || [globalVar = TSFE:id = 52]
	lib.news_list.settings.categories = 3
[end]

lib.news_detail < lib.news
lib.news_detail {
	action = detail
	switchableControllerActions.News.1 = detail
}

[globalVar = TSFE:id = 17]
	lib.news_detail.settings.backPid = 17
[end]

[globalVar = TSFE:id = 51]
	lib.news_detail.settings.backPid = 51
[end]

[globalVar = TSFE:id = 21]
	lib.news_detail.settings.backPid = 21
[end]

[globalVar = TSFE:id = 52]
	lib.news_detail.settings.backPid = 52
[end]

[globalVar = TSFE:id = 25]
	lib.news_detail.settings.backPid = 25
[end]

[globalVar = TSFE:id = 53]
	lib.news_detail.settings.backPid = 53
[end]

# Setting up twitter extension
plugin.tx_wttwitter {
	view.templateRootPath = EXT:tmpl_voltearte/Resources/Private/Templates/TwitterNewsTicker/
	settings.setup {
		account = voltearte
		limit = 3
	}
	widgets {
		widget = USER
		widget {
			userFunc = tx_extbase_core_bootstrap->run
			pluginName = List
			extensionName = WtTwitter
			controller = Twitter
			action = list
			switchableControllerActions {
				Twitter {
					1 = list
				}
			}
			settings =< plugin.tx_wttwitter.settings
			persistence =< plugin.tx_wttwitter.persistence
			view =< plugin.tx_wttwitter.view
		}
	}
}

lib.twitter = COA
lib.twitter {
  10  < plugin.tx_wttwitter.widgets.widget
}

# Setting up powermail extension
plugin.tx_powermail {
	view {
		templateRootPath = {$tmplVoltearte.view.templateRootPath}Powermail/
		partialRootPath = {$tmplVoltearte.view.partialRootPath}Powermail/
		layoutRootPath = {$tmplVoltearte.view.layoutRootPath}Powermail/
	}
	settings {
		main {
			pid = {$tmplVoltearte.storagePids.powermail}
			form = {$tmplVoltearte.frontendPids.form}
			confirmation = 0
			optin = 0
			moresteps = 0
		}
	}
	settings.setup.debug.spamshield = 1
	settings.setup.spamshield._enable = 0
}