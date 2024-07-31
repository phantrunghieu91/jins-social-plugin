'use strict';
declare const wp: any;
import AddSocials from "../modules/add-socials";
import Tabs from "../modules/tabs";

document.addEventListener("DOMContentLoaded", function () {
  const addSocials = new AddSocials(wp);
  const tabs = new Tabs(document.querySelector(".tab-nav"), document.querySelector(".tab-content"));
});