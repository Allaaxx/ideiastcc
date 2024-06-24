@extends('back.layout.dashboard-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md 12">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-dark">Adicionar Subcategoria</h4>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('admin.manage-categories.cats-subcats-list') }}" class="boxed-btn">
                            <i class="ion-arrow-left-a"></i>Volta para lista de Categorias
                        </a>
                    </div>
                </div>
                <hr>
                <form action="{{ route('admin.manage-categories.store-subcategory') }}" method="POST" enctype="multipart/form-data" class="mt-3">
                    @csrf
                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            <strong><i class="dw dw-checked"></i></strong>
                            {!! Session::get('success') !!}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <Span arial-hidden="true">&times;</Span>
                            </button>
                        </div>
                        
                    @endif

                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        <strong><i class="dw dw-checked"></i></strong>
                        {!! Session::get('fail') !!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <Span arial-hidden="true">&times;</Span>
                        </button>
                    </div>
                    
                @endif

                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Categoria pai</label>
                           <select name="parent_category" id="" class="form-control">
                                <option value="">Não selecionado</option>
                                @foreach($categories as $item)
                                    <option value="{{ $item->id }}" {{ old('parent_category') == $item->id ? 'selected' : '' }}>{{ $item->category_name }}</option>
                                @endforeach
                           </select>
                            @error('parent_category')
                                <span class="text-danger ml-2">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Nome da Subcategoria</label>
                            <input type="text" class="form-control" name="subcategory_name"
                            placeholder="Digite o nome da Subcategoria" value="{{ old('subcategory_name')}}">
                            @error('subcategory_name')
                                <span class="text-danger ml-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="">Descendente de</label>
                            <select name="is_child_of" id="" class="form-control">
                                <option value="0">-- Independent --</option>
                                @foreach($subcategories as $item)
                                    <option value="{{ $item->id }}" {{ old('is_child_of') == $item->id ? 'selected' : ''}}>{{ $item->subcategory_name}}</option>
                                @endforeach
                            </select>
                            @error('is_child_of')
                                <span class="text-danger ml-2">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        
                    </div>
                </div>
                <button type="submit" class="boxed-btn ">Criar Categoria</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    
@endpush