
@if(session('status'))
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="alert alert-danger">
                    <ul>                                       
                        <li>{!!session('status')!!}</li>                         
                    </ul>
                </div>
            </div>
        </div>
    </div> 
@endif

