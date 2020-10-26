<x-home-page>
    @section('content')
        <main role="main">
        
            <section class="jumbotron text-center">
                <div class="container">

                @if(session()->has('ErrorStatus') || $errors->any())
                    <div class="alert alert-danger" style="border:solid 1px"><span class="glyphicon glyphicon-remove"></span><em><strong> 
                    {{ session()->get('ErrorStatus') }} {{ implode(' | ', $errors->all(':message')) }}</strong></em>  
                    </div>          
                @elseif(session()->has('SuccessStatus') )
                    <div class="alert alert-success" style="border:solid 1px"><span class="glyphicon glyphicon-ok"></span><em><strong> {{ session()->get('SuccessStatus') }}</strong></em></div>
                @endif

                    <h1 class="jumbotron-heading">Items Management Page</h1>
                    <hr class="mb-5 ttl_hr"/>

                    <div class="row">
                        <div class="col-md-4">
                        {{ Form::open(array('url' => '/save-item', 'class'=>'form-inline')) }}
                            <div class="form-group mb-2 w-75 pr-2 width_input_100">
                                {{ Form::text('item_name', '', ['placeholder'=>'Enter Item Name', 'class'=>'form-control']) }}
                            </div>
                            <div class="w-25 width_input_100">{{ Form::submit('Add', ['type' => 'submit', 'class'=>'btn btn-primary mb-2']) }}</div> 
                        {{ Form::close() }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card h-400">
                                <ul class="list-group list-group-flush">
                                @foreach($items as $item)
                    
                                    @if($item->item_type == '1')
                                        <li class="list-group-item left_item" data-id="{{ $item->id }}">{{ $item->item_name }}</li>
                                    @endif

                                @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                        

                            <a href="javascript:void(0)" id="shift_right" class="action_btn"><i class="fa fa-angle-right fa-2x"></i></a><br>
                            <a href="javascript:void(0)" id="shift_left" class="action_btn"><i class="fa fa-angle-left fa-2x"></i></a>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-400">
                                <ul class="list-group list-group-flush">
                                @foreach($items as $item)
                    
                                    @if($item->item_type == '2')
                                        <li class="list-group-item right_item" data-id="{{ $item->id }}">{{ $item->item_name }}</li>
                                    @endif

                                @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
    
        </main>
    @endsection
</x-home-page>