
plugin.tx_twsimpleworklist_frontendsimpleworklist {
  view {
    templateRootPaths.0 = EXT:tw_simpleworklist/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_twsimpleworklist_frontendsimpleworklist.view.templateRootPath}
    partialRootPaths.0 = EXT:tw_simpleworklist/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_twsimpleworklist_frontendsimpleworklist.view.partialRootPath}
    layoutRootPaths.0 = EXT:tw_simpleworklist/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_twsimpleworklist_frontendsimpleworklist.view.layoutRootPath}
  }
  persistence {
    storagePid = {$plugin.tx_twsimpleworklist_frontendsimpleworklist.persistence.storagePid}
    #recursive = 1
    classes {
      ThomasWoehlke\TwSimpleworklist\Domain\Model\UserAccount {
        mapping {
          tableName = fe_users
          columns {
            username.mapOnProperty = userEmail
            password.mapOnProperty = userPassword
            name.mapOnProperty = userFullname
          }
        }
      }
    }
  }
  features {
    #skipDefaultArguments = 1
  }
  mvc {
    #callDefaultActionIfActionCantBeResolved = 1
  }
}

plugin.tx_twsimpleworklist._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .typo3-messages .message-error {
        color:red;
    }

    .typo3-messages .message-ok {
        color:green;
    }
)

page.includeJSFooterlibs.jqueryui = http://code.jquery.com/ui/1.11.4/jquery-ui.js
page.includeJSFooterlibs.jqueryui.external = 1

page.jsInline.999 = TEXT
page.jsInline.999.value (
    $(window).load( function() {
      $( ".dataDetailListTitle").draggable({ cursor: "crosshair", revert: "invalid"  });
      $( ".categoryNode" ).draggable({ cursor: "crosshair", revert: "invalid"  });
      $( ".categoryNode" ).droppable({
          drop: function( event, ui ) {
              var selfId = ("" + $( this ).attr("id")).split("_")[1];
              var draggableId = "" +ui.draggable.attr("id").split("_")[1];
              var draggableType = ""+ui.draggable.attr("id").split("_")[0];
              var rootUrl = "";
              if(draggableType == "dataDetail" || draggableType == "dataDetailProject"){
                  rootUrl += '<c:url value="/task"/>';
              } else {
                  rootUrl += '<c:url value="/project"/>';
              }
              //var html4move = '<a href="'+rootUrl+'/'+draggableId+'/moveto/'+selfId+'">move</a>';
              //$( this ).html(html4move);
              var html4move = rootUrl+'/'+draggableId+'/moveto/'+selfId;
              window.location.replace(html4move);
          }
      });
      $( ".dataDetailListTitle" ).droppable({
          drop: function( event, ui ) {
              var selfId = ("" + $( this ).attr("id")).split("_")[1];
              var draggableId = "" +ui.draggable.attr("id").split("_")[1];
              var draggableType = ""+ui.draggable.attr("id").split("_")[0];
              var rootUrl = "";
              if(draggableType == "dataDetail") {
                  rootUrl = '<c:url value="/task"/>';
              } else if(draggableType == "dataDetailProject") {
                  rootUrl = '<c:url value="/project/task"/>';
              }
              var html4move = rootUrl + '/' + draggableId + '/changeorderto/' + selfId;
              window.location.replace(html4move);
          }
      });
      $("#focus_inbox").droppable({
          drop: function( event, ui ) {
              var selfId = ("" + $( this ).attr("id")).split("_")[1];
              var draggableId = "" +ui.draggable.attr("id").split("_")[1];
              var draggableType = ""+ui.draggable.attr("id").split("_")[0];
              var rootUrl = "";
              if(draggableType == "dataDetail" || draggableType == "dataDetailProject"){
                  var html4move = '/tasks/move/'+draggableId+'/to/inbox';
                  window.location.replace(html4move);
              }
          }
      });
      $("#focus_today").droppable({
          drop: function( event, ui ) {
              var selfId = ("" + $( this ).attr("id")).split("_")[1];
              var draggableId = "" +ui.draggable.attr("id").split("_")[1];
              var draggableType = ""+ui.draggable.attr("id").split("_")[0];
              var rootUrl = "";
              if(draggableType == "dataDetail" || draggableType == "dataDetailProject"){
                  var html4move = '/tasks/move/'+draggableId+'/to/today';
                  window.location.replace(html4move);
              }
          }
      });
      $("#focus_next").droppable({
          drop: function( event, ui ) {
              var selfId = ("" + $( this ).attr("id")).split("_")[1];
              var draggableId = "" +ui.draggable.attr("id").split("_")[1];
              var draggableType = ""+ui.draggable.attr("id").split("_")[0];
              var rootUrl = "";
              if(draggableType == "dataDetail" || draggableType == "dataDetailProject"){
                  var html4move = '/tasks/move/'+draggableId+'/to/next';
                  window.location.replace(html4move);
              }
          }
      });
      $("#focus_waiting").droppable({
          drop: function( event, ui ) {
              var selfId = ("" + $( this ).attr("id")).split("_")[1];
              var draggableId = "" +ui.draggable.attr("id").split("_")[1];
              var draggableType = ""+ui.draggable.attr("id").split("_")[0];
              var rootUrl = "";
              if(draggableType == "dataDetail" || draggableType == "dataDetailProject"){
                  var html4move = '/tasks/move/'+draggableId+'/to/waiting';
                  window.location.replace(html4move);
              }
          }
      });
      $("#focus_someday").droppable({
          drop: function( event, ui ) {
              var selfId = ("" + $( this ).attr("id")).split("_")[1];
              var draggableId = "" +ui.draggable.attr("id").split("_")[1];
              var draggableType = ""+ui.draggable.attr("id").split("_")[0];
              var rootUrl = "";
              if(draggableType == "dataDetail" || draggableType == "dataDetailProject"){
                  var html4move = '/tasks/move/'+draggableId+'/to/someday';
                  window.location.replace(html4move);
              }
          }
      });
      $("#focus_completed").droppable({
          drop: function( event, ui ) {
              var selfId = ("" + $( this ).attr("id")).split("_")[1];
              var draggableId = "" +ui.draggable.attr("id").split("_")[1];
              var draggableType = ""+ui.draggable.attr("id").split("_")[0];
              var rootUrl = "";
              if(draggableType == "dataDetail" || draggableType == "dataDetailProject"){
                  var html4move = '/tasks/move/'+draggableId+'/to/completed';
                  window.location.replace(html4move);
              }
          }
      });
      $("#focus_trash").droppable({
          drop: function( event, ui ) {
              var selfId = ("" + $( this ).attr("id")).split("_")[1];
              var draggableId = "" +ui.draggable.attr("id").split("_")[1];
              var draggableType = ""+ui.draggable.attr("id").split("_")[0];
              var rootUrl = "";
              if(draggableType == "dataDetail" || draggableType == "dataDetailProject"){
                  var html4move = '/tasks/move/'+draggableId+'/to/trash';
                  window.location.replace(html4move);
              }
          }
      });
      $("#taskDueDate ").datepicker({
          dateFormat: 'yy-mm-dd',
          constrainInput: false
      });
  });
)