import Alpine from 'alpinejs'

import NotificationsAlpinePlugin from '../../vendor/filament/notifications/dist/module.esm'
Alpine.plugin(NotificationsAlpinePlugin)

import FormsAlpinePlugin from "../../vendor/filament/forms/dist/module.esm";
Alpine.plugin(FormsAlpinePlugin)

import Focus from "@alpinejs/focus";
Alpine.plugin(Focus)

window.Alpine = Alpine

Alpine.start()
