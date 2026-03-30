import './bootstrap';

import toastr from 'toastr';
import 'toastr/build/toastr.min.css';

import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.min.css';
import { Japanese } from "flatpickr/dist/l10n/ja.js";
flatpickr.localize(Japanese);

// toastr display defaults shared across pages.
toastr.options = {
    closeButton: true,
    progressBar: true,
    positionClass: 'toast-top-center',
    timeOut: 4000,
};

// Register $toastr for Alpine components when Alpine is available.
const registerToastrMagic = () => {
    if (window.Alpine && typeof window.Alpine.magic === 'function') {
        window.Alpine.magic('toastr', () => toastr);
    }
};

registerToastrMagic();
document.addEventListener('alpine:init', registerToastrMagic);
