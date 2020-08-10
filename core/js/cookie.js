import {CONSTS} from './consts';
import {$el} from './funcs';

const COOKIE = $el('.cookie');
const COOKIE_BUTTON = $el('.cookie .cookie__button');

if (COOKIE_BUTTON !== null) {
    COOKIE_BUTTON.addEventListener('click', e => {
        COOKIE.classList.add('hide');
        setTimeout(e => COOKIE.remove(), 400);
        document.cookie = 'agreedWithCookie=true; path=/; max-age=' + (60 * 60 * 24 * 30 * 12);
    });
}
