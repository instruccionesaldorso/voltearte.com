# Remove csc-default
tt_content.stdWrap {
	prefixComment >
	innerWrap.cObject.default >
}

# Grid elements for videos
tt_content.gridelements_pi1 {
	10 =< lib.stdheader
	10 {
		wrap = |<hr>
	}
	20 {
		10.setup {
			# ID of gridelement
			1 < lib.gridelements.defaultGridSetup
			1 {
				columns {
					# colPos ID
					0 < .default
					0.wrap = <div class="small-12 large-6 columns">|</div>
					# colPos ID
					1 < .0
				}
				wrap = <div class="row">|</div>
			}
			2 < .1
			2 {
				columns {
					0.wrap = <div class="small-12 large-3 columns">|</div>
					1 < .0
					2 < .1
					3 < .2
				}
			}
		}
	}
}

# Vimeo videos
tt_content.vimeo {
20.value (
	<div class="flex-video vimeo">
		<a class="th radius" href="http://vimeo.com/moogaloop.swf?clip_id={t3datastructure : pi_flexform->vimeoID}&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;fullscreen=1" class="lightbox">
			<object width="{t3datastructure : pi_flexform->width}" height="{t3datastructure : pi_flexform->height}">
				<param name="allowfullscreen" value="true" />
				<param name="allowscriptaccess" value="always" />
				<param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id={t3datastructure : pi_flexform->vimeoID}&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;fullscreen=1" />
				<embed src="http://vimeo.com/moogaloop.swf?clip_id={t3datastructure : pi_flexform->vimeoID}&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="{t3datastructure : pi_flexform->width}" height="{t3datastructure : pi_flexform->height}"></embed>
			</object>
		</a>
	</div>
	)
}

# File links
tt_content.uploads.20.itemRendering.wrap.cObject {
	10.foundiconClass = paper-clip
	20.value = <li class="{register:oddEvenClass} {register:elementClass}"><i class="gen-enclosed foundicon-{register:foundiconClass}"></i>|</li>
}

# Adapting portfolio section to responsive template.
tt_content.image.20 {
	stdWrap.prefixComment >
	#imageStdWrapNoWidth.wrap = <li>|</li>
	imageStdWrap.dataWrap = |
	imageColumnStdWrap.dataWrap = <div class="csc-textpic-imagecolumn"> | </div>
	rendering {
		simple.imageStdWrap.dataWrap = <div class="csc-textpic-imagewrap csc-textpic-single-image"> | </div>
		div {
			imageRowStdWrap.dataWrap = <ul class="small-block-grid-1 large-block-grid-3">|</ul>
			imageLastRowStdWrap.dataWrap = <ul class="small-block-grid-1 large-block-grid-3">|</ul>
		}
	}
	renderMethod = div
	1.imageLinkWrap.typolink.ATagParams.dataWrap = class="th radius"
}

[PIDinRootline = 15,19,23,27,4]
	tt_content.image.20 {
		1 {
			imageLinkWrap.linkParams.ATagParams.dataWrap = class="{$styles.content.imgtext.linkWrap.lightboxCssClass} th radius" data-fancybox-group="lightbox{field:uid}"
			file.width.field >
			file.width = 188c
			file.height = 190c
			file.width.override.field = imagewidth
			file.height.override.field = imageheight
		}
	}
[end]

# Adding wrap for portfolio images.
[PIDinRootline = 15,19,23,27]
	tt_content.image.20.rendering.div.oneImageStdWrap.dataWrap = <li>|</li>
[end]
