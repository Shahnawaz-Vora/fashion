(function($){'use strict';var SITE=SITE||{};SITE={init:function(){var self=this,obj;self.defaultConfig();self.bindEvents()},defaultConfig:function(){"use strict";var self=this;self.$document=$(document);self.$window=$(window);self.$html=$('html');self.$body=$('body');self.$isCheckout=(self.$body.hasClass('woocommerce-checkout'))?!0:!1},bindEvents:function(){"use strict";var self=this;if(self.$isCheckout){self.checkoutElements()}},checkoutElements:function(){var self=this,$confirmButton=$('#argmc-submit');$confirmButton.attr('disabled',!0)},};$(document).ready(function(){SITE.init()})})(jQuery)