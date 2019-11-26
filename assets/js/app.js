/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
import '../scss/home.scss';
import '../scss/lists.scss';
import '../scss/detail.scss';

import './components/home.js';
import './components/superlist.js';

import $ from 'jquery';
import 'bootstrap';


//import theFunctionName from './superlist.js');
// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// const $ = require('jquery');