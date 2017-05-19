!function (window, document, $) {
    "use strict";

    //Custom input type class
    jsGrid.setDefaults({
        tableClass: "jsgrid-table table table-striped table-hover"
    });

    jsGrid.setDefaults("text", {
        _createTextBox: function () {
            return $("<input>").attr("type", "text").attr("class", "form-control");
        }
    });
	

    jsGrid.setDefaults("number", {
        _createTextBox: function () {
            return $("<input>").attr("type", "number").attr("class", "form-control");
        }
    });

    jsGrid.setDefaults("textarea", {
        _createTextBox: function () {
            return $("<input>").attr("type", "textarea").attr("class", "form-control");
        }
    });

    jsGrid.setDefaults("control", {
        _createGridButton: function (cls, tooltip, clickHandler) {
            var grid = this._grid;
            return $("<button>").addClass(this.buttonClass).addClass(cls).attr({
                type: "button",
                title: tooltip
            }).on("click", function (e) {
                clickHandler(grid, e)
            })
        }
    });

    //Custom Select class
    jsGrid.setDefaults("select", {
        _createSelect: function () {
            var $result = $("<select>").attr("class", "form-control"),
                valueField = this.valueField,
                textField = this.textField,
                selectedIndex = this.selectedIndex;

            $.each(this.items, function (index, item) {
                var value = valueField ? item[valueField] : index,
                    text = textField ? item[textField] : item;

                var $option = $("<option>")
                    .attr("value", value)
                    .text(text)
                    .appendTo($result);

                $option.prop("selected", (selectedIndex === index));
            });

            return $result;
        }
    });
	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

    //Basic jsGrid
	$(document).ready(function(){
    $("#jsGridBasic").jsGrid({
        height: "500px",
        width: "100%",
        filtering: true,
        editing: true,
        inserting: true,
        sorting: true,
        paging: true,
        autoload: true,
        pageSize: 15,
        pageButtonCount: 5,
        pagePrevText: "<",
        pageNextText: ">",
        pageFirstText: "<<",
        pageLastText: ">>",
        deleteConfirm: "Quiere borrar el programa?",
                controller: {
					loadData: function(filter) {
    var d = $.Deferred();

    // server-side filtering
    $.ajax({
        type: "GET",
        url: "../../../codigo/ajax/listaProgamas.php",
        data: filter,
        dataType: "json"
    }).done(function(result) {
        // client-side filtering
        d.resolve(result);

       
    })

    return d.promise();
}
	,				
					
					


			insertItem: function (item) {
                    $.ajax({
                        type: "POST",
                        url: "../../../codigo/ajax/insertaProgamas.php",
                        data: item
                    });
                },
                updateItem: function (item) {
                    $.ajax({
                        type: "POST",
                        url: "../../../codigo/ajax/updateProgamas.php",
                        data: item
                    });
                },
                deleteItem: function (item) {
                    $.ajax({
                        type: "POST",
                        url: "../../../codigo/ajax/deleteProgamas.php",
                        data: item
                    });
                }
        },
        onInit: function(){
            $('.jsgrid-grid-body').perfectScrollbar();
        },
        fields: [
			{name: "ID", type: "text", width: 30},
            {name: "Nombre", type: "text", width: 150},
            {name: "Inicio", type: "text", width: 90},
            {name: "Fin", type: "text", width: 90},
			 {name: "T", type: "text", title: "ºC", width: 50, },
            {name: "L", type: "checkbox", title: "L", width: 50, },
			{name: "M", type: "checkbox", title: "M", width: 50, },
			{name: "X", type: "checkbox", title: "X", width: 50, },
			{name: "J", type: "checkbox", title: "J", width: 50, },
			{name: "V", type: "checkbox", title: "V", width: 50, },
			{name: "S", type: "checkbox", title: "S", width: 50, },
			{name: "D", type: "checkbox", title: "D", width: 50, },
			{name: "Activo", type: "checkbox", title: "Activo", },
            {type: "control"}
        ]
    });
});
    //Static Data jsGrid
    $("#jsGridStaticdata").jsGrid({
        height: "500px",
        width: "100%",
        sorting: true,
        paging: true,
        pagePrevText: "<",
        pageNextText: ">",
        pageFirstText: "<<",
        pageLastText: ">>",
        fields: [
            {name: "Name", type: "text", width: 150},
            {name: "Age", type: "number", width: 70, align: "center"},
            {name: "Address", type: "text", width: 200},
            {name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name"},
            {name: "Married", type: "checkbox", title: "Is Married"}
        ],
        onInit: function(){
            $('.jsgrid-grid-body').perfectScrollbar();
        },
        data: db.clients
    });

    //OData service jsGrid
    $("#jsGridODataservice").jsGrid({
        height: "500px",
        width: "100%",
        sorting: true,
        paging: false,
        pagePrevText: "<",
        pageNextText: ">",
        pageFirstText: "<<",
        pageLastText: ">>",
        autoload: true,
        onInit: function(){
            $('.jsgrid-grid-body').perfectScrollbar();
        },
        controller: {
            loadData: function () {
                var d = $.Deferred();

                $.ajax({
                    url: "http://services.odata.org/V3/(S(3mnweai3qldmghnzfshavfok))/OData/OData.svc/Products",
                    dataType: "json"
                }).done(function (response) {
                    d.resolve(response.value);
                });

                return d.promise();
            }
        },
        fields: [
            {name: "Name", type: "text", width: 100},
            {name: "Description", type: "textarea", width: 200},
            {
                name: "Rating", type: "number", width: 150, align: "center",
                itemTemplate: function (value) {
                    return $("<div>").addClass("rating").append(Array(value + 1).join("&#9733;"));
                }
            },
            {
                name: "Price", type: "number", width: 100,
                itemTemplate: function (value) {
                    return value.toFixed(2) + "$";
                }
            }
        ]
    });

    //Sorting jsGrid
    $("#jsGridSorting").jsGrid({
        height: "500px",
        width: "100%",
        autoload: true,
        selecting: false,
        pagePrevText: "<",
        pageNextText: ">",
        pageFirstText: "<<",
        pageLastText: ">>",
        controller: db,
        onInit: function(){
            $('.jsgrid-grid-body').perfectScrollbar();
        },
        fields: [
            {name: "Name", type: "text", width: 150},
            {name: "Age", type: "number", width: 70, align: "center"},
            {name: "Address", type: "text", width: 200},
            {name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name"},
            {name: "Married", type: "checkbox", title: "Is Married"}
        ]
    });

    //Sorting btn click event
    $("#sorting-btn").click(function () {
        var field = $("#sortingField").val();
        $("#jsGridSorting").jsGrid("sort", field);
    });

    //Loading Data jsGrid
    $("#jsGridLoadingdata").jsGrid({
        height: "500px",
        width: "100%",
        autoload: true,
        paging: true,
        pageLoading: true,
        pageSize: 15,
        pagePrevText: "<",
        pageNextText: ">",
        pageFirstText: "<<",
        pageLastText: ">>",
        pageIndex: 2,
        controller: {
            loadData: function (filter) {
                var startIndex = (filter.pageIndex - 1) * filter.pageSize;
                return {
                    data: db.clients.slice(startIndex, startIndex + filter.pageSize),
                    itemsCount: db.clients.length
                };
            }
        },
        onInit: function(){
            $('.jsgrid-grid-body').perfectScrollbar();
        },
        fields: [
            {name: "Name", type: "text", width: 150},
            {name: "Age", type: "number", width: 70, align: "center"},
            {name: "Address", type: "text", width: 200},
            {name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name"},
            {name: "Married", type: "checkbox", title: "Is Married"}
        ]
    });

    //Pager click event
    $("#pager").on("change", function () {
        var page = parseInt($(this).val(), 10);
        $("#jsGridLoadingdata").jsGrid("openPage", page);
    });

    //Custom jsGrid
    $("#jsGridCustomrowRenderer").jsGrid({
        height: "500px",
        width: "100%",
        autoload: true,
        paging: true,
        pagePrevText: "<",
        pageNextText: ">",
        pageFirstText: "<<",
        pageLastText: ">>",
        controller: {
            loadData: function () {
                var deferred = $.Deferred();

                $.ajax({
                    url: 'http://api.randomuser.me/?results=40',
                    dataType: 'jsonp',
                    success: function (data) {
                        deferred.resolve(data.results);
                    }
                });

                return deferred.promise();
            }
        },
        rowRenderer: function (item) {
            var user = item;
            var $photo = $("<div>").addClass("client-photo").append($("<img>").attr("src", user.picture.large));
            var $info = $("<div>").addClass("client-info")
                .append($("<p>").append($("<strong>").text(user.name.first.capitalize() + " " + user.name.last.capitalize())))
                .append($("<p>").text("Location: " + user.location.city.capitalize() + ", " + user.location.street))
                .append($("<p>").text("Email: " + user.email))
                .append($("<p>").text("Phone: " + user.phone))
                .append($("<p>").text("Cell: " + user.cell));

            return $("<tr>").append($("<td>").append($photo).append($info));
        },
        onInit: function(){
            $('.jsgrid-grid-body').perfectScrollbar();
        },
        fields: [
            {title: "Clients"}
        ]
    });

    String.prototype.capitalize = function () {
        return this.charAt(0).toUpperCase() + this.slice(1);
    };

    //Custom Pager jsGrid
    $("#jsGridCustomizedPager").jsGrid({
        height: "450px",
        width: "100%",
        paging: true,
        pageSize: 15,
        pageButtonCount: 5,
        pagerContainer: "#externalPager",
        pagerFormat: "current page: {pageIndex} &nbsp;&nbsp; {first} {prev} {pages} {next} {last} &nbsp;&nbsp; total pages: {pageCount} total items: {itemCount}",
        pagePrevText: "<",
        pageNextText: ">",
        pageFirstText: "<<",
        pageLastText: ">>",
        pageNavigatorNextText: "&#8230;",
        pageNavigatorPrevText: "&#8230;",
        onInit: function(){
            $('.jsgrid-grid-body').perfectScrollbar();
        },
        fields: [
            {name: "Name", type: "text", width: 150},
            {name: "Age", type: "number", width: 70, align: "center"},
            {name: "Address", type: "text", width: 200},
            {name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name"},
            {name: "Married", type: "checkbox", title: "Is Married"}
        ],
        data: db.clients
    });

    //CORE_TEMP.function.initPerfectScroll($(".jsgrid .jsgrid-grid-body"));

}(window, document, jQuery);