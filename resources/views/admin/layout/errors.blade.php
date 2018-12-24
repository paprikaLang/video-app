@if (count($errors) > 0)
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">输入错误提示</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                      <div class="col-sm-2">
                          <i class="fa fa-info-circle fa-4x"></i>
                      </div>
                        <div class="col-sm-9">
                          @foreach ($errors->all() as $error)
                             {{ $error }}<br>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        require(['jquery'],function ($) { // $ is not a function
            require(['bootstrap'], function (e) {
                $('#exampleModal').modal('show');
                setTimeout(function () {
                    $('#exampleModal').modal('hide');
                }, 3000);
            })
        })

    </script>
@endif