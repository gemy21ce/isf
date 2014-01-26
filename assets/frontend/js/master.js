/* --------------------------
 * BASE MLAF v0.6
 * --------------------------
*/

$(document).ready( function() {
	initMasterLookAndFeel();
});

function initMasterLookAndFeel() {
	try {	
		/*** HEADER ***/
		$(".intel-hdr").each( function() {
			if (!($(this).attr('id'))) {
				$(this).attr("id", "hdr"+ IUtility.guid()); 				
			}
			var tmpHeader = new IHeader("#" + $(this).attr("id"), null, null, null, null, null, null);
			tmpHeader.init();
		});	
			
		/*** TABLE ***/
		$(".intel-table").each( function() {
			if (!($(this).attr('id'))) {
				$(this).attr("id", "tbl"+ IUtility.guid()); 				
			}
			var tmpTable = new ITable("#" + $(this).attr("id"));
			tmpTable.init();
		});	
				
		/*** TAB ***/
		$(".intel-tab").each( function() {
			if (!($(this).attr('id'))) {
				$(this).attr("id", "tab"+ IUtility.guid());				
			}
			
			var tabContent = $(this).next(".intel-tab-content");
			if (!(tabContent.attr('id'))) {
				tabContent.attr("id", "tabCnt"+ IUtility.guid());				
			}
			
			var tmpTab = new ITab("#" + $(this).attr("id"), "#" + tabContent.attr("id"));
			tmpTab.init();
		});			
		
		/*** ACCORDION ***/
		//Left Navigation setup; example of setting 1 UI Component and letting the others default
		//Note: if you want to re-init a component first remove the init attribute from the element.
		var leftNav = new IAccordion("#navLeft", true);
		leftNav.init();
		
		$(".intel-accordion").each( function() {
			if (!($(this).attr('id'))) {
				$(this).attr("id", "acc"+ IUtility.guid());				
			}
			var tmpAcc = new IAccordion("#" + $(this).attr("id"), false);
			tmpAcc.init();
		});
		
		var tmpTOC = new ITOC("#toc");
		tmpTOC.init();
		
	}
	catch (ex) {
		console.log(ex.name + " " + ex.message);
	}	
}

/**
Class Description
@class ITOC
@param {String} newContext
@requires jQuery
@constructor
**/
var ITOC = function ( newContext ) {
	try {
		this.context = newContext;
		this.elem = $(newContext);
	}
	catch (e) {
		console.log("ITOC.constructor.exception: " + e.name + ":" + e.message);
	}
};

	ITOC.prototype = {
		/**
		Method description 
		@method init
		**/
		init: function() {
			try {		
				var html = "<h2>Table of Contents</h2>";
				html += "<ul>";
				
				//Iterate over h2's with ID's
				$("h2").each(function() {
					if ($(this).attr('id')) {
						var el = $(this);
						var title = el.text();
						var link = "#" + el.attr("id");
						html += "<li><a href=\""+link+"\">"+title+"</a></li>";
						
						//find child h3 with ids matching parent h2 id
						var parent = $(this).parent();
						parent.find("h3").each( function() {
							if ($(this).attr('id')) {
								var id = $(this).attr('id');
								var text = $(this).text();
								var patt = new RegExp(el.attr("id"));
								if (patt.test(id)) {
									html += "<li>&nbsp;&nbsp;&nbsp;<a href=\"#"+id+"\">"+text+"</a></li>";
								}
							}						
						});
					}
				});
				
				html += "</ul>";
				this.elem.html(html);
				
			}
			catch (e) {
				console.log("ITOC.init.exception: " + e.name + ":" + e.message);
			}
		}
	};

/**
Class Description
@class IHeader
@param {String} newContext
@param {Fucntion} fnSearch
@param {Funciton} fnHelp
@param {String} user
@requires jQuery
@constructor
**/
var IHeader = function ( newContext, fnSearch, fnHelp, fnMenu, fnBack, fnNext, user) {
	try {
		this.context = newContext;
		this.elem = $(newContext);	
		 var self = this;
		
		this.fnSearch = fnSearch ? fnSearch : function() { alert("Search not yet implemented"); };
		this.fnHelp = fnHelp ? fnHelp : function() { alert("Help not yet implemented"); };
		this.fnMenu = fnMenu ? fnMenu : function() { $(".pure-g-r .intel-leftnav").toggleClass("active"); };
		this.fnBack = fnBack ? fnBack : function() { alert("Back not yet implemented"); };
		this.fnNext = fnNext ? fnNext : function() { alert("Next not yet implemented"); };
		
		this.user = user ? user : "User";
	}
	catch (e) {
		console.log("IHeader.constructor.exception: " + e.name + ":" + e.message);
	}
};

	IHeader.prototype = {
		/**
		Method description 
		@method init
		**/
		init: function() {
			try{
				if (!(this.elem.attr("init") == "true")) {					
					this.elem.attr("init", "true");
					//Header Search click
					$(this.context + " .intel-hdr-search").click(this.fnSearch);
					
					//Header Help click
					$(this.context + " .intel-hdr-help").click(this.fnHelp);	
					
					//Header Menu click
					$(this.context + " .intel-hdr-btn-menu").click(this.fnMenu);	
					
					//Header Back click
					$(this.context + " .intel-hdr-btn-back").click(this.fnBack);
					$(this.context + " .intel-hdr-btn-back-simple").click(this.fnBack);
					
					
					//Header Next click
					$(this.context + " .intel-hdr-btn-next").click(this.fnNext);
					$(this.context + " .intel-hdr-btn-next-simple").click(this.fnNext);				
					
					//Set the User
					$(this.context + " .intel-hdr-user").text("Hello " + this.user + "!");
					
					//Set the WW
					Date.prototype.getWeek = function() {
					    var firstDay = new Date(this.getFullYear(),0,1);		
					    var diff = firstDay.getDay();
					    if (diff) {
					    	var newDate = new Date(firstDay);
					    	newDate.setDate(newDate.getDate() - diff);
					    	firstDay = new Date(newDate);
					    }		  
					    return Math.floor((((this - firstDay) / 86400000))/7 + 1);
					};	
			
					var dt = new Date();
					$(this.context + " .intel-hdr-ww").text("WW" + dt.getWeek() + ", " + dt.getFullYear());	
				}				
			}
			catch (e) {
				console.log("IHeader.init.exception: " + e.name + ":" + e.message);
			}
		}
	};

/**
Class Description
@class ITable
@param {String} newContext
@requires jQuery
@constructor
**/
var ITable = function ( newContext ) {
	try {
		this.table = $(newContext);	
	}
	catch (e) {
		console.log("ITable.constructor.exception: " + e.name + ":" + e.message);
	}
};
	//https://github.intel.com/IT-UI-Assets/IT-Master-Look-and-Feel-StyleSheet/blob/36e55ca8ae25205809b13d6b025b4c9f2fc27f8f/js/app.js
	ITable.prototype = {
		/**
		Method description 
		@method init
		**/
		init: function() {
			try {
				if (!(this.table.attr("init") == "true")) {					
					this.table.attr("init", "true");
					var self = this.table;  	
					
					var isNumeric = function (input) {
		        		input = input.replace(",","");
		        		input = input.replace("%","");
		        		return (input >= 0 || input < 0);
		        	};
					
					self.find("td, tfoot th").each(function() {
						var cell = $(this);
						if ( isNumeric(cell.text()) ) {			            	
							cell.addClass("intel-right");
						}
					});	
				}			
			}
			catch (e) {
				console.log("ITable.init.exception: " + e.name + ":" + e.message);
			}		
		}		
	};

/**
Class Description
@class ITab
@param {String} newContext
@requires jQuery
@constructor
**/
var ITab = function ( newTabContext, newContentContext ) {
	this.tab = $(newTabContext);	
	this.content = $(newContentContext);
	this.tabContext = newTabContext;
	this.contentContext = newContentContext;
};

	ITab.prototype = {
		/**
		Method description 
		@method init
		**/
		init: function() {
			try {
				if (!(this.tab.attr("init") == "true")) {					
					this.tab.attr("init", "true");
					var self = this;
					self.tab.find('a').click(function() {
					    //Tab
					    var parent = $(this).parent().parent();
					    var prev = parent.find('.active');	    
					    prev.removeClass('active');					    
					    $(this).addClass('active');						    
					    
					    //Content
					    var target = $(this).attr("tab"); 
					    self.content.find(".active").removeClass("active");
					    $(target).addClass("active");
					});
					
					if (!(self.content.find(".active").length >= 1)) {
						//Mark first tab as active
						self.tab.children().find(":first-child a").addClass("active");					
	
						//Mark first tab content area as active
						var target = self.tab.children().find(":first-child a").attr("tab");
						$(target).addClass("active");
					}
				}
			}
			catch (e) {
				console.log("ITab.init.exception: " + e.name + ":" + e.message);
			}		
		}		
	};

/**
Class Description
@class IAccordion
@param {String} newContext
@param {Boolean} setActiveOnLoad - sets the active menu item on load via Regex
@requires jQuery
@constructor
**/
var IAccordion = function ( newContext, setActiveOnLoad ) {
	this.elem = $(newContext);	
	this.setActiveOnLoad = setActiveOnLoad;
};

	IAccordion.prototype = {
		/**
		Method description 
		@method init
		**/
		init: function() {
			try {
				if (!(this.elem.attr("init") == "true")) {					
					this.elem.attr("init", "true");
					var toggleHeader = function() {	
						$(this).toggleClass("active");
						$(this).next().toggleClass("active");
					};
					this.elem.children("h3").click(toggleHeader);
					this.elem.children("ul").children("li").children("h3").click(toggleHeader);
					
					var toggleLink = function() {		
						var tmpElem = $(this).parents(".intel-accordion");
						//Get rid of the other selected items
						tmpElem.find(".intel-selected").removeClass("intel-selected");			
						
						//Close active menus
						tmpElem.find(".active").removeClass("active");	
						
						//Apply active to parent menus (title and list)
						var tmpParents = $(this).parents("ul");
						tmpParents.each(function () {
							$(this).addClass("active");
							$(this).prev().addClass("active");
						});
						
						//Apply selected to current link
						$(this).toggleClass("intel-selected");
					};
					this.elem.children("a").click(toggleLink);
					this.elem.children("ul").children("li").children("a").click(toggleLink);
					this.elem.children("ul").children("li").children("ul").children("li").children("a").click(toggleLink);
					
					//sets the active menu item on load via Regex
					if (this.setActiveOnLoad) {
						this.elem.find("a").each( function() {
							var href = new RegExp($(this).attr("href"));
							var hash = window.location.hash;
							var sPath = window.location.pathname;
							var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
							if (href.test(sPage)) {
								$(this).addClass("intel-selected");
							}
							else if (href.test(hash)) {
								$(this).addClass("intel-selected");
							}
						});	
					}
				}
			}
			catch (e) {
				console.log("IAccordion.init.exception: " + e.name + ":" + e.message);
			}
		}
	};
	

function IUtility() {};
	/**
	A utility function for use in generating a GUID 
	@method S4
	@return {String} subGuid Generated substring of a GUID.
	@private
	*/
	IUtility.S4 = function() {
		return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
	};
	
	/**
	This function generates a GUID (globally unique identifier).
	@method guid	 
	@return {String} guid The generated GUID.
	**/
	IUtility.guid = function() {
	    return (this.S4()+this.S4()+"-"+this.S4()+"-"+this.S4()+"-"+this.S4()+"-"+this.S4()+this.S4()+this.S4());
	};

