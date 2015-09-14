(function() {"use strict";angular.module('App', [
'wrapParse'
])
.controller('AppController',AppController)
.run(run)
.factory('HWMR', HWMRFactory)
.factory('Events', Events)
AppController.$inject = ['HWMR','Events'];
HWMRFactory.$inject = ['wrapParse'];
Events.$inject = ['wrapParse'];


function AppController(HWMR,Events) {
  "use strict";
  var app = this;
  app.HWMR = HWMR;
  app.events = Events;
  app.HWMR.getCurrent();
  app.events.upcoming();

}

function run() {
  Parse.initialize('b2l5PYQroLkavAfxHBj6Kp4bjTBXbjWSRTKG9W5C','HRln25dExujDPBqfUyFgx42erhjDGotb2aiC7qlk');
}

function HWMRFactory(wrapParse) {
  var HWMR = wrapParse('HWMR', {
    week: Number,
    bookTitle: String,
    messageTitle: String,
    endDate: Date,
  });
  
  HWMR.current = null;
  
  HWMR.getCurrent = function() {
    var query = HWMR.query();
    var d = new Date();
    var todaysDate = new Date(d.getTime()); 
    query.greaterThanOrEqualTo('endDate', todaysDate);
    query.limit(1);
    query.ascending("endDate");
    query.find(function(results){
      console.log(results);
      HWMR.current = results[0];
    })
    
  }

  return HWMR;
}
function Events(wrapParse) {
  var Events = wrapParse('Events', {
    title: String,
    dates: String,
    address: String,
    city:String,
    note: String,
    endDate: Date,
  });
  
  Events.upcoming = function() {
    var query = Events.query();
    var d = new Date();
    var todaysDate = new Date(d.getTime()); 
    query.greaterThanOrEqualTo('endDate', todaysDate);
    query.ascending("endDate");
    query.find(function(results){
      console.log(results);
      Events.all = results;
    })
    
  }

  return Events;
}



})();