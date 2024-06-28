<footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        @foreach($aplikasi as $row)
                        <span>Copyright &copy; {{$row->copyright}}</span>
                        @endforeach
                    </div>
                </div>
            </footer>