
//async espera q se envien los datos, await espera
const cargarMarcas = async()=>{
    //1. Ir a buscar las marcas a la API
    let resultado = await axios.get("api/marcas/get");
    let marcas = resultado.data;
    //console.log(resultado.data);

    //2. Cargar las marcas dentro del select
    let marcaSelect = document.querySelector("#marca-select");
    marcas.forEach(m=>{ //foreach por cada uno, el for comun recorre con indice
        let option = document.createElement("option");
        option.innerText = m;
        marcaSelect.appendChild(option);
    });
};

cargarMarcas();