import Alpine from 'alpinejs';

import NotificationsAlpinePlugin from '../../vendor/filament/notifications/dist/module.esm';
import FormsAlpinePlugin from "../../vendor/filament/forms/dist/module.esm";
import Focus from "@alpinejs/focus";

// Register Alpine.js plugins
Alpine.plugin(NotificationsAlpinePlugin);
Alpine.plugin(FormsAlpinePlugin);
Alpine.plugin(Focus);

// Initialize Alpine.js
window.Alpine = Alpine;
Alpine.start();
