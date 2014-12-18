# Setting up logo
lib.logo = IMAGE
lib.logo {
	file = {$tmplVoltearte.settings.publicResourcesRootPath}Images/logo.png
	altText = Voltearte
	stdWrap.typolink {
		parameter = 1
		title = {$logoTitle}
	}
}

[globalVar = TSFE:id = 1]
	lib.logo.stdWrap.typolink >
	#lib.tagline.stdWrap.typolink >
	# Uncomment this and fix style
[end]

##################################################
# styles.content.get by fluid template variables
##################################################
lib.getContent = COA
lib.getContent {
	cnt < styles.content.get
	cnt.select.where.cObject = COA
	cnt.select.where.cObject{
		10 = TEXT
		10.current = 1
		10.wrap = colPos = |
	}

	10 = COA
	10 {
		# render content
		10.if.isTrue.numRows < lib.getContent.cnt
		10 < lib.getContent.cnt
	}
}

# Setting up language selector
lib.languages = HMENU
lib.languages {
	special = language
	special.value = 0,1
	special.normalWhenNoLanguage = 0
	addQueryString = 1
	addQueryString.method = GET
	wrap = <ul id="menu_lang">|</ul>
	1 = TMENU
	1.noBlur = 1
	1 {
		NO = 1
		NO {
			linkWrap =<li>|</li>|*|
			stdWrap.override = Español || English ||
			ATagParams = title="Español" alt="Español" || title="English" alt="English"
		}
		ACT < .NO
		ACT {
			doNotLinkIt = 1
		}
		USERDEF1 < .NO
		USERDEF1 {
			doNotLinkIt = 1
		}
		USERDEF2 < .ACT
		USERDEF2 {
			doNotLinkIt = 1
		}
	}
}

# Disabled temporarily
lib.languages >

# Setting up tagline
lib.tagline = TEXT
lib.tagline {
	value = Voltearte Project
	stdWrap.typolink {
		parameter = 1
		title = Voltearte Project
	}
}

# Setting up title/subtitle
lib.title = TEXT
lib.title.data = page:title

[globalVar = GP:tx_news_pi1|news > 0]
	lib.headerTitle = RECORDS
	lib.headerTitle {
		dontCheckPid = 1
		tables = tx_news_domain_model_news
		source.data = GP:tx_news_pi1|news
		source.intval = 1
		conf.tx_news_domain_model_news = TEXT
		conf.tx_news_domain_model_news {
			field = title
			htmlSpecialChars = 1
		}
		wrap = <title>|</title>
	}
[global]

lib.subtitle = TEXT
lib.subtitle.data = page:subtitle

# Setting up breadcrumbs
lib.breadcrumbs = COA
lib.breadcrumbs {
	wrap = <ul class="breadcrumbs hide-for-small">|</ul>
	10 = HMENU
	10 {
		#stdWrap.wrap =
		special = rootline
		special.range = 0
		1 = TMENU
		1.NO {
			stdWrap.htmlSpecialChars = 1
			allWrap = <li>|</li>
			# For IE ?
			#ATagParams.dataWrap = class="home" title="{field:title}" || title="{field:title}"  || title="{field:title}"
		}
		1.ACT {
			allWrap = <li class="current">|</li>
		}
		1.CUR = 1
		1.CUR < lib.breadcrumbs.10.1.NO
		1.CUR {
			allWrap = <li class="current"><span>|</span></li>
			doNotLinkIt = 1
		}
	}
	# Add news title if on single view
	20 = RECORDS
	20 {
		if.isTrue.data = GP:tx_news_pi1|news
		dontCheckPid = 1
		tables = tx_news_domain_model_news
		source.data = GP:tx_news_pi1|news
		source.intval = 1
		conf.tx_news_domain_model_news = TEXT
		conf.tx_news_domain_model_news {
			field = title
			htmlSpecialChars = 1
			wrap = <li class="current"><span>|</span></li>
			#crop = 65 | ... | 1
		}
	}
}

[globalVar = GP:tx_news_pi1|news > 0]
	lib.breadcrumbs.10.1.CUR {
		allWrap = <li>|</li>
		doNotLinkIt = 0
	}
[end]

lib.getYear = TEXT
lib.getYear {
	data = date:Y
}

lib.slider = CONTENT
lib.slider {
	table = tt_content
	wrap = |
	select {
		selectFields = bodytext
		where = uid = 149
	}
}