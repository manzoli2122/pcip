@extends('templates.master')

@section('content')

<section class="content-header">
	<h1>
		<span id="div-titulo-pagina">Listagem dos Produtos	</span>
		<small style="float: right;">
			
		</small>
	</h1>
</section>	
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-success" id="div-box"> 
				<div class="box-body" style="padding-top: 5px; padding-bottom: 3px;">
					<table class="table table-bordered table-striped table-hover" id="datatable">
						<thead>	
							<tr>
								<th style="max-width:20px">ID</th>
								<th pesquisavel>Nome</th>
								<th>Descricao</th>	
								<th class="align-center" style="width:140px">Ações</th>
							</tr>
						</thead>	
					</table>
				</div>
					  
			</div>
		</div>
	</div>
</section>
@endsection


@push(Config::get('app.templateMasterScript' , 'script') )
	<script src="{{ mix('js/datatables-padrao.js') }}" type="text/javascript"></script>
	
	<script>
		var pagianIndex = document.getElementById("div-pagina").innerHTML;		
		function modelIndexDataTableFunction() {
			var dataTable = datatablePadrao('#datatable', {
				order: [[ 1, "asc" ]],
				ajax: { 
					url:'{{ route('disciplina.getDatatable') }}'
				},
				columns: [
					{ data: 'id', name: 'id' ,  visible: @perfil('Admin') true @else false  @endperfil },
					{ data: 'nome', name: 'nome' },
					{ data: 'descricao', name: 'descricao' },	
					{ data: 'action', name: 'action', orderable: false, searchable: false, class: 'align-center'}
				],
			});
			dataTable.on('draw', function () {
				
				$('[btn-excluir]').click(function (){
					excluirRecursoPeloId($(this).data('id'), "@lang('msg.conf_excluir_o', ['1' => 'disciplina'])", "{{ route('disciplina.index') }}", 
						function(){
							dataTable.row( $(this).parents('tr') ).remove().draw('page');
						}
					);
				});
				$('[btn-show]').click(function (){					
					modelShow($(this).data('id'), "{{ route('disciplina.index') }}",
						function(data){							
							document.getElementById("div-pagina").innerHTML = data ;						
						}
					);                 
				});
				$('[btn-editar]').click(function (){					
					modelEditar($(this).data('id'), "{{ route('disciplina.index') }}"	);                 
				});
			});
		}
		$(document).ready(function() {
			modelIndexDataTableFunction();
		});
	</script>
@endpush