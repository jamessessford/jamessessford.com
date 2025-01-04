window.axios = require('axios');
import Alpine from "alpinejs";
import Typewriter from '@marcreichel/alpine-typewriter'
import Fuse from "fuse.js";

window.Blazy = require('blazy')
window.Fuse = Fuse;
window.Alpine = Alpine;

var blazy = new Blazy();

Alpine.plugin(Typewriter);
Alpine.start();