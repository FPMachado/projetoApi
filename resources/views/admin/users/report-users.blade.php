<div class="drop-shadow-lg bg-gray-500 px-2 py-2 rounded-md" style="margin-top: 36px; margin-left: 30px; margin-right: 10px; width: 90%;">
    <h3 class="items-center text-center p-1  text-yellow-500 text-xl">Configurações do Relatório</h3>
    <div class="text-center">
        <form action="{{route('admin.users.report')}}" method="post" id='form-formulario'>
            @csrf
            <label for="tipoRel">Tipo Relatório:</label>
            <select name="tipoRel" id="tipoRel" class="border text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400 mb-6 w-72" onchange="tipoRela(this.value)">
                <option selected value="movie01">USER01 - Listagem de Usuários</option>
            </select>  
            <div>
                <button class="bg-green-500 hover:bg-green-400 rounded-lg py-3 px-3" style="width: 176px;" type="submit" id='gerar' onclick='verificaTipoRel()'>Gerar</button>
            </div>
        </form>
    </div>
</div>