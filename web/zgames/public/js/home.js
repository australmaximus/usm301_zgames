
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

document.querySelector("#registrar-btn").addEventListener("click", async ()=>{
    let nombre = document.querySelector("#nombre-txt").value;
    let marca = document.querySelector("#marca-select").value;
    let anio = document.querySelector("#anio-txt").value;
    let consola = {};
    consola.nombre = nombre;
    consola.marca = marca;
    consola.anio = anio;
    //TODO: Falta validar!!!


    //solo esta linea hace:
    //1. Va al controlador, le pasa los datos
    //2. El controlador crea el modelo
    //3. El modelo ingresa en la base de datos
    //4. Todos felices

    let res = await crearConsola(consola);

    //Mostar mensaje de exito con SweetAlert2
    Swal.fire("Consola Creada", "Consola creada exitosamente", "success");
});