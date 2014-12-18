#######################################
# @author 		sergio.catala@e-net.info
# @file 		Root/constants.ts
#
# TSFE constants
#######################################
tmplVoltearte {
	settings {
		# Ext path
		extPath = tmpl_voltearte/

		# Private Resources Path
		privateResourcesRootPath = EXT:{$tmplVoltearte.settings.extPath}Resources/Private/

		# Public Resources Path
		publicResourcesRootPath = EXT:{$tmplVoltearte.settings.extPath}Resources/Public/

		news.backPid = 6
	}
	view {
		# Path to main templates
		templateRootPath = {$tmplVoltearte.settings.privateResourcesRootPath}Templates/

		# Path to main partials
		partialRootPath = {$tmplVoltearte.settings.privateResourcesRootPath}Partials/

		# Path to main layouts
		layoutRootPath = {$tmplVoltearte.settings.privateResourcesRootPath}Layouts/
	}
	storagePids.powermail = 68
	frontendPids.form = 69
}

# General URL
url = http://www.voltearte.com

# Translations
logoTitle = Ir a la página de inicio
description = Voltearte es un grupo de artistas que fusiona diferentes disciplinas circenses con las tendencias más contemporáneas de las artes escénicas. La especialización y versatilidad de cada uno de sus miembros les hace posible ofrecer desde actuaciones individuales que se adaptan a cualquier tipo de evento hasta espectáculos conjuntos, además de colaboraciones con otros artistas y compañías. Raquel Carpio con la Rueda Alemana, el malabarista Sergio Pla, Ángel Sánchez, acróbata multidisciplinar y ex componente del Circo del Sol (Cirque du Soleil); y Vicky Terrádez, especialista en técnicas aéreas.
keywords = espectáculos, animaciones, circo, teatro, pasacalles, circo calle,  acrobacia, rueda alemana, rueda cyr, cyr rou, telas aéreas, pulls, equilibrios, aro aéreo, lyra, trapecio, mano-mano, adaggio, malabares, straps, correas, hamaca, mástil chino, mât chinoise, chinese pole, cama elástica, voltearte, Ángel Sánchez, Vicky terrádez, Raquel carpio, Sergio pla, acróbatas, circo del sol, tú sí que vales, festival, eventos, ambientación, elegante, sutil, Valencia, Madrid, España

[globalVar = GP:L=1]
	logoTitle = Go to homepage
	description =
	keywords =
[global]
