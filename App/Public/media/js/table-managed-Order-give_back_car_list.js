var TableManaged = function () {

    return {

        //main function to initiate the module
        init: function () {
            
            if (!jQuery().dataTable) {
                return;
            }

            // begin first table
            $('.sample_1').dataTable({
                "aoColumns": [
                  { "bSortable": true },
                  { "bSortable": true },
				  { "bSortable": true },
				  { "bSortable": false },
				  { "bSortable": true },
				  { "bSortable": true },
				  { "bSortable": true },
				  { "bSortable": false },
				  { "bSortable": false },
				  { "bSortable": true },
				  { "bSortable": true },
				  { "bSortable": false },
				  { "bSortable": false },
				   { "bSortable": true },
				    { "bSortable": false }

                ],
                "aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                "aaSorting": [
					[ 9, "desc" ]
				],
                // set the initial value
                "iDisplayLength": 20,

                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
                "sPaginationType": "bootstrap",		//分页样式处理函数
                "oLanguage": {
                    "sLengthMenu": "_MENU_ 每页条数",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                },
                "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [0]
                    }
                ]
            });


        }

    };

}();