@extends('admin.dashboard')

@section('maincontent')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Product Trash</h3>
        </div>


        <div class="card-body">

            <div class="form-group text-right">
                {{-- <a href="#" class="btn btn-outline-danger" id="restore"></i>Restore All</a> --}}
                <a href="{{ route('product.index') }}" class="btn btn-outline-primary"></i>Back</a>
            </div>
            <table id="myTable" class="display table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>product </th>
                        <th>UPC</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Colour</th>
                        <th>Category</th>
                        <th>action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($product as $col)
                        <tr>


                            <td>{{ $col->id }}</td>
                            <td><img src="{{ asset('uploads/products/'.$col->image) }}" width="100px" height="100px" alt="image"></td>

                            <td id="name-{{ $col->id }}">{{ $col->name }}</td>
                            <td id="name-{{ $col->id }}">{{ $col->upc }}</td>
                            <td id="name-{{ $col->id }}">{{ $col->price }}</td>
                            <td id="name-{{ $col->id }}">{{ $col->stock }}</td>
                            <td id="name-{{ $col->id }}">{{ $col->colour->name }}</td>
                            <td id="name-{{ $col->id }}">{{ $col->category->name }}</td>
                            <td>
                                <div>
                                    <a href="{{ url('/product/restoretrash', [$col->id]) }}" class="restoretrash"
                                        data-id="{{ $col->id }}"> <i class="fas fa-trash-alt"></i> </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
@endsection

@push('custom-script')
    {{-- <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js"></script> --}}
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>



    {{-- <script src="../../plugins/"></script>
   <script src="../../plugins/"></script>
   <script src="../../plugins/"></script> --}}

    <script>
        $(document).ready(function() {
            $('.card-body #myTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "responsive": true,
                "autoWidth": true,
            });
        });      
    </script>
    
@endpush

</body>

</html>
