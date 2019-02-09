            <div class="footer">
                <div class="pull-right">
                    <strong>{elapsed_time} detik</strong>
                </div>
                <div>
                    <strong>Copyright</strong> Sistem informasi Manajemen Kemahasiswaan © 2018
                </div>
            </div>

        </div>
    </div>

    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

        <!-- Background of PhotoSwipe. 
             It's a separate element as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>

        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">

            <!-- Container that holds slides. 
                PhotoSwipe keeps only 3 of them in the DOM to save memory.
                Don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">

                    <!--  Controls are self-explanatory. Order can be changed. -->

                    <div class="pswp__counter"></div>

                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                    <button class="pswp__button pswp__button--share" title="Share"></button>

                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                    <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                    <!-- element will get class pswp__preloader->active when preloader is running -->
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                          <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                          </div>
                        </div>
                    </div>
                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div> 
                </div>

                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>

                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>

            </div>

        </div>

    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url('assets/js/jquery-2.1.1.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/dataTables/datatables.min.js')?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url('assets/js/inspinia.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/pace/pace.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/jsKnob/jquery.knob.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/datapicker/bootstrap-datepicker.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/jasny/jasny-bootstrap.min.js')?>" rel="stylesheet"></script>

    <!-- Flot -->
    <script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.tooltip.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.resize.js')?>"></script>

    <!-- Core Photo Swipe JS file -->
    <script src='<?php echo base_url(); ?>assets/js/plugins/photoswipe/photoswipe.min.js'></script>
    <script src='<?php echo base_url(); ?>assets/js/plugins/photoswipe/photoswipe-ui-default.min.js'></script> 
    <script src="<?php echo base_url(); ?>assets/js/plugins/photoswipe/index.js"></script>

    <!-- SUMMERNOTE -->
    <script src="<?php echo base_url('assets/js/plugins/summernote/summernote.min.js')?>"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            $('table#mytable').DataTable();
            $('textarea#summernote').summernote();

            $('#laporan_legalisir').DataTable({
                initComplete: function () {
                    this.api().columns().every( function () {
                        var column = this;
                        var select = $('<select><option value=""></option></select>')
                            .appendTo( $(column.footer()).empty() )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
         
                                column
                                    .search( val ? '^'+val+'$' : '', true, false )
                                    .draw();
                            } );
         
                        column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        } );
                    } );
                },
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                        {
                          extend: 'excel', 
                          title: 'Laporan Legalisir',
                          exportOptions: {
                            columns: [0,1,2,3,4,5,6,7]
                          }
                        },
                        {
                          extend: 'pdf', 
                          alignment:'center',
                          orientation: 'potrait',
                          pageSize: 'A4',
                          title: 'Laporan Legalisir',
                          exportOptions: {
                            columns: [0,1,2,3,4,5,6,7]
                          },
                            styles: {
                                tableHeader: {
                                bold: 0,
                                fontSize: 11,
                                color: "#595959",
                                alignment: "center"
                                }
                            },
                            customize: function (doc) {
                                doc.pageMargins = [45, 20, 45, 20];
                                doc.defaultStyle.fontSize = 7;
                                doc.styles.tableHeader.fontSize = 7;
                                doc.styles.title.fontSize = 11;
                                // Remove spaces around page title
                                doc.content[0].text = doc.content[0].text.trim();
                                // Create a footer
                                doc['footer']=(function(page, pages) {
                                    if(page.toString() == pages.toString()) {
                                        return {
                                            columns: [
                                                'Sumber: Kasubbag'
                                            ],
                                            margin: [45, 0]
                                            }
                                    }
                                });
                                // Styling the table: create style object
                                var objLayout = {};
                                // Horizontal line thickness
                                objLayout['hLineWidth'] = function(i) { return .5; };
                                // Vertikal line thickness
                                objLayout['vLineWidth'] = function(i) { return .5; };
                                // Horizontal line color
                                objLayout['hLineColor'] = function(i) { return '#aaa'; };
                                // Vertical line color
                                objLayout['vLineColor'] = function(i) { return '#aaa'; };
                                // Left padding of the cell
                                objLayout['paddingLeft'] = function(i) { return 4; };
                                // Right padding of the cell
                                objLayout['paddingRight'] = function(i) { return 4; };
                                // Inject the object in the document
                                doc.content[1].layout = objLayout;
                            }
                        },
                        {
                          extend: 'print',
                          title: '<center>Laporan Legalisir</center>',
                          exportOptions: {
                            columns: [0,1,2,3,4,5,6,7]
                          },
                          customize: function (win){
                            $(win.document.body)
                                .css( 'font-size', '10pt' )
                                .css( 'background-color', 'white')
         
                            $(win.document.body).find( 'table' )
                                .addClass( 'compact' )
                                .css( 'font-size', 'inherit' );

                          }
                        }
                    ]
            });

            $('#laporan_kegiatan').DataTable({
                initComplete: function () {
                    this.api().columns().every( function () {
                        var column = this;
                        var select = $('<select><option value=""></option></select>')
                            .appendTo( $(column.footer()).empty() )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
         
                                column
                                    .search( val ? '^'+val+'$' : '', true, false )
                                    .draw();
                            } );
         
                        column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        } );
                    } );
                },
                searching: false, paging: false, info: false,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                        {
                          extend: 'excel', 
                          title: 'Laporan Kegiatan',
                          exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8]
                          }
                        },
                        {
                          extend: 'pdf', 
                          alignment:'center',
                          orientation: 'potrait',
                          pageSize: 'A4',
                          title: 'Laporan Kegiatan',
                          exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8]
                          },
                            styles: {
                                tableHeader: {
                                bold: 0,
                                fontSize: 11,
                                color: "#595959",
                                alignment: "center"
                                }
                            },
                            customize: function (doc) {
                                doc.pageMargins = [45, 20, 45, 20];
                                doc.defaultStyle.fontSize = 7;
                                doc.styles.tableHeader.fontSize = 7;
                                doc.styles.title.fontSize = 11;
                                // Remove spaces around page title
                                doc.content[0].text = doc.content[0].text.trim();
                                // Create a footer
                                doc['footer']=(function(page, pages) {
                                    if(page.toString() == pages.toString()) {
                                        return {
                                            columns: [
                                                'Sumber: Kasubbag'
                                            ],
                                            margin: [45, 0]
                                            }
                                    }
                                });
                                // Styling the table: create style object
                                var objLayout = {};
                                // Horizontal line thickness
                                objLayout['hLineWidth'] = function(i) { return .5; };
                                // Vertikal line thickness
                                objLayout['vLineWidth'] = function(i) { return .5; };
                                // Horizontal line color
                                objLayout['hLineColor'] = function(i) { return '#aaa'; };
                                // Vertical line color
                                objLayout['vLineColor'] = function(i) { return '#aaa'; };
                                // Left padding of the cell
                                objLayout['paddingLeft'] = function(i) { return 4; };
                                // Right padding of the cell
                                objLayout['paddingRight'] = function(i) { return 4; };
                                // Inject the object in the document
                                doc.content[1].layout = objLayout;
                            }
                        },
                        {
                          extend: 'print',
                          title: '<center>Laporan Kegiatan</center>',
                          exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8]
                          },
                          customize: function (win){
                            $(win.document.body)
                                .css( 'font-size', '10pt' )
                                .css( 'background-color', 'white')
         
                            $(win.document.body).find( 'table' )
                                .addClass( 'compact' )
                                .css( 'font-size', 'inherit' );

                          }
                        }
                    ]

            });
        });

        $('#tambah_spjlpj').on('show.bs.modal', function(e) {
            var id_kegiatan = $(e.relatedTarget).data('id-kegiatan');
            $(e.currentTarget).find('input[name="id_kegiatan"]').val(id_kegiatan);

            var nama_file = $(e.relatedTarget).data('nama-file');
            $(e.currentTarget).find('input[name="nama_file"]').val(nama_file);
        });

        $('#perbaiki_spjlpj').on('show.bs.modal', function(e) {
            var id_kegiatan = $(e.relatedTarget).data('id-kegiatan');
            $(e.currentTarget).find('input[name="id_kegiatan"]').val(id_kegiatan);

            var nama_file = $(e.relatedTarget).data('nama-file');
            $(e.currentTarget).find('input[name="nama_file"]').val(nama_file);
        });
    </script>

</body>

</html>