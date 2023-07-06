<div class="drop-shadow-lg bg-gray-500 px-2 py-2 rounded-md" style="margin-top: 36px; margin-left: 30px; margin-right: 10px; width: 90%;">
    <h3 class="items-center text-center p-1  text-yellow-500 text-xl">Configurações do Relatório</h3>
    <div class="text-center">
        <form action="" method="post">
            @csrf
            <label for="tipoRel">Tipo Relatório:</label>
            <select name="tipoRel" id="tipoRel" class="border text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400 mb-6 w-72" onchange="tipoRela(this.value)">
                <option disabled selected value>Selecione uma opção</option>
                <option value="movie01">Listagem de Filmes</option>
                <option value="movie02">Filmes Filtrados por Data de Atualização</option>
            </select>  
            <label for="date" id="labelDe">De:</label>
            <input class="border text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400 mb-6" type="date" name="dateSta" id="dateSta">
            <label for="date" id="labelAte">Até</label>
            <input class="border text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400 mb-6" type="date" name="dateEnd" id="dateEnd">
        </form>
        <div>
            <button form="form-edit" class="bg-green-500 hover:bg-green-400 rounded-lg py-3 px-3" style="width: 176px;" type="submit">Gerar</button>
        </div>
    </div>
</div>