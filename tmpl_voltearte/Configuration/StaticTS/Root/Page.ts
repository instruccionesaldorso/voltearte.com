#######################################
# @author 		sergio.catala@e-net.info
# @package 		tmpl_voltearte staticTS
# @file 		Page.ts
#
# basic PAGE object definition
#######################################

page = PAGE
page {
	typeNum = 0

	config {
		sys_language_mode = content_fallback
		sys_language_overlay = hideNonTranslated
		linkVars = L
		language = es
		locale_all = es_ES.UTF8
		uniqueLinkVars = 1
		simulateStaticDocuments = 0
		tx_realurl_enable = 1
		baseURL = {$url}/
		prefixLocalAnchors = all
		intTarget = _self
		extTarget = _blank
	}

	shortcutIcon = {$tmplVoltearte.settings.publicResourcesRootPath}Images/favicon.ico

	meta {
		description {
			field = description
			ifEmpty = {$description}
		}
		keywords {
			field = keywords
			ifEmpty = {$keywords}
		}
		viewport = width=device-width
	}

	includeCSS >
	includeCSS {
		# Normalize + Basic foundation framework + Custom styles
		styles = {$tmplVoltearte.settings.publicResourcesRootPath}Css/styles.css
		styles.media = all

		# Fancybox
		fancybox = EXT:cl_jquery_fancybox/fancybox2/jquery.fancybox.css
		fancybox.media = all

 		# Select2
		select2 = {$tmplVoltearte.settings.publicResourcesRootPath}Js/Vendor/Select2/select2.css
		select2.media = all
	}

	headerData {
		10 = TEXT
		10 {
			field = title
			noTrimWrap = |<title>| - Voltearte.com</title>|
		}

		20 = TEXT
		20.value (
			<script type="text/javascript">
				<!--
					function obscureAddMid() {
						document.write('@');
					}
					function obscureAddEnd() {
						document.write('.');
					}
				// -->
			</script>
		)
	}

	includeJSlibs {
		modernizr = {$tmplVoltearte.settings.publicResourcesRootPath}Js/Vendor/modernizr.js
		jquery = {$tmplVoltearte.settings.publicResourcesRootPath}Js/Vendor/jquery.js
		fastclick = {$tmplVoltearte.settings.publicResourcesRootPath}Js/Vendor/fastclick.js
	}

	includeJS >
	includeJS {
		#fancybox = {$tmplVoltearte.settins.publicResourcesRootPath}Js/Vendor/jquery.fancybox.pack.js
	}
	includeJSFooterlibs >
	includeJSFooter >
	includeJSFooter {
		#select2 = {$tmplVoltearte.settings.publicResourcesRootPath}Js/Vendor/Select2/select2.min.js
		#select2_es = {$tmplVoltearte.settings.publicResourcesRootPath}Js/Vendor/Select2/select2_locale_es.js
	}

	10 = FLUIDTEMPLATE
	10 {
		file.stdWrap.cObject = TEXT
		file.stdWrap.cObject {
			data = levelfield:-2,backend_layout_next_level,slide
			override.field = backend_layout
			split {
				token = file__
				1.current = 1
				1.wrap = |
			}
			wrap = {$tmplVoltearte.view.templateRootPath}BackendLayouts/|.html
		}

		# Layouts and partials
		partialRootPath = {$tmplVoltearte.view.partialRootPath}
		layoutRootPath = {$tmplVoltearte.view.layoutRootPath}

		# System template objects
		variables {

		}

		settings < tmplVoltearte.settings
	}

	# Remove some ie7 google chrome stuff
	1000 >

	# Insert Google code
	1001 = TEXT
	1001 {
		wrap = <script type="text/javascript">|</script>
		value (
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-35864377-1']);
			_gaq.push(['_trackPageview']);
			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		)
	}

	1111 = COA
	1111 {
		10 = TEXT
		10 {
			value = /typo3conf/ext/{$tmplVoltearte.settings.extPath}Resources/Public/Js/Foundation/foundation.js
			insertData = 1
			wrap = <script src="|"></script>
		}
		20 = TEXT
		20 {
			value = /typo3conf/ext/{$tmplVoltearte.settings.extPath}Resources/Public/Js/Foundation/foundation.abide.js
			insertData = 1
			wrap = <script src="|"></script>
		}
		30 = TEXT
		30 {
			value = /typo3conf/ext/{$tmplVoltearte.settings.extPath}Resources/Public/Js/Foundation/foundation.equalizer.js
			insertData = 1
			wrap = <script src="|"></script>
		}
		40 = TEXT
		40 {
			value = /typo3conf/ext/{$tmplVoltearte.settings.extPath}Resources/Public/Js/Foundation/foundation.orbit.js
			insertData = 1
			wrap = <script src="|"></script>
		}
		50 = TEXT
		50 {
			value = /typo3conf/ext/{$tmplVoltearte.settings.extPath}Resources/Public/Js/Foundation/foundation.topbar.js
			insertData = 1
			wrap = <script src="|"></script>
		}
		60 = TEXT
		60 {
			value = /typo3conf/ext/{$tmplVoltearte.settings.extPath}Resources/Public/Js/Vendor/jquery.fancybox.pack.js
			insertData = 1
			wrap = <script src="|"></script>
		}
		70 = TEXT
		70 {
			value = /typo3conf/ext/{$tmplVoltearte.settings.extPath}Resources/Public/Js/Vendor/Select2/select2.min.js
			insertData = 1
			wrap = <script src="|"></script>
		}
		80 = TEXT
		80 {
			value = /typo3conf/ext/{$tmplVoltearte.settings.extPath}Resources/Public/Js/Vendor/Select2/select2_locale_es.js
			insertData = 1
			wrap = <script src="|"></script>
		}
		90 = TEXT
		90.value(
			<script>
				$(document).foundation();
				$(document).ready(function() {
					$("select").select2({
						width: "element"
					});
				});
			</script>
		)
	}
}

# Setting up news list and detail on the same page
[PIDinRootline = 6,17,21,25,29,51,52,53,54]
	lib.getContent < lib.news_list
	#page.10.variables.content < lib.news_list
[end]

[globalVar = GP:tx_news_pi1|news > 0]
	lib.getContent < lib.news_detail
	page {
		headerData {
			10 >
			10 < lib.headerTitle
		}
	}
[end]

# Setting up English language as alternative language
[globalVar = GP:L = 1]
	page.config {
		sys_language_uid = 1
		language = en
		locale_all = en_EN.UTF8
	}
[end]