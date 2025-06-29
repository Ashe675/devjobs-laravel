import './bootstrap';

import Alpine from 'alpinejs';

import Swal from 'sweetalert2';
import alertUtils from './utils/alerts';

window.alertUtils = alertUtils;

window.Swal = Swal;

window.Alpine = Alpine;

Alpine.start();
