import './bootstrap';
import '../css/app.css';
import select from './nova-poshta/select'
import count from './nova-poshta/count'

const locale = document.querySelector('html').getAttribute('lang')
select(locale).init();
count(locale).init();
