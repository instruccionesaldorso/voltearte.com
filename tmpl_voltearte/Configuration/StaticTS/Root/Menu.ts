# Setting up menu
lib.menu = HMENU
lib.menu {
	entryLevel = 0
	1 = TMENU
	1 {
		noBlur = 1
		expAll = 1
		NO = 1
		NO {
			wrapItemAndSub = <li class="divider"></li><li>|</li>
			doNotLinkIt = 1
			stdWrap.htmlSpecialChars = 0
			stdWrap.cObject = COA
			stdWrap.cObject {
				10 = TEXT
				10 {
					field = title
					typolink.parameter.field = uid
					typolink.ATagParams.dataWrap = title="{field:title}"
					preCObject = TEXT
					preCObject.wrap = <i class="fi-torsos-all"></i> || <i class="fi-results-demographics"></i> || <i class="fi-camera"></i> || <i class="fi-list-thumbnails"></i> || <i class="fi-comment"></i>
				}
			}
		}
		ACT < .NO
		ACT = 1
		ACT {
			wrapItemAndSub = <li class="divider"></li><li class="active">|</li>
			#doNotLinkIt = 1
		}
	}
}

# Setting up submenus
lib.submenu = HMENU
lib.submenu {
	entryLevel = 1
	1 = TMENU
	1 {
		#stdWrap.wrap = <dl class="sub-nav">|</dl>
		noBlur = 1
		expAll = 1
		#wrap = |
		NO = 1
		NO {
			wrapItemAndSub = <dd>|</dd>
			ATagParams.dataWrap = title="{field:title}" class="button expand radius"
		}
		CUR < .NO
		CUR = 1
		CUR {
			wrapItemAndSub = <dd class="active">|</dd>
			#doNotLinkIt = 1
			ATagParams.dataWrap = title="{field:title}" class="button expand disabled radius"
		}
	}
}

[PIDinRootline = 10,11,12,13]
	lib.submenu {
		entryLevel = 2
		1 {
			NO {
				doNotLinkIt = 1
				stdWrap.htmlSpecialChars = 0
				stdWrap.cObject = COA
				stdWrap.cObject {
					10 = TEXT
					10 {
						field = title
						typolink.parameter.field = uid
						typolink.ATagParams.dataWrap = title="{field:title}" class="button expand radius"
						preCObject = TEXT
						preCObject.wrap = <i class="fi-torso"></i> || <i class="fi-social-instagram"></i> || <i class="fi-play-video"></i> || <i class="fi-list-thumbnails"></i> || <i class="fi-comment"></i>
					}
				}
			}
			CUR < .NO
			CUR {
				stdWrap.cObject.10.typolink.ATagParams.dataWrap = title="{field:title}" class="button expand disabled radius"
			}
		}
	}
[global]

[PIDinRootline = 7,57,58,59]
	lib.submenu {
		1 {
			NO {
				doNotLinkIt = 1
				stdWrap.htmlSpecialChars = 0
				stdWrap.cObject = COA
				stdWrap.cObject {
					10 = TEXT
					10 {
						field = title
						typolink.parameter.field = uid
						typolink.ATagParams.dataWrap = title="{field:title}" class="button expand radius"
						preCObject = TEXT
						preCObject.wrap = <i class="fi-social-facebook"></i> || <i class="fi-social-twitter"></i> || <i class="fi-social-vimeo"></i>
					}
				}
			}
			CUR < .NO
			CUR {
				stdWrap.cObject.10.typolink.ATagParams.dataWrap = title="{field:title}" class="button expand disabled radius"
			}
		}
	}
[global]
