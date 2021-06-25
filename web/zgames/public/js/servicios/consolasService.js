// ESTE ARCHIVO VA A TENER LAS OPERACIONES TIPICAS PARA COMUNICARSE CON EL CONTROLADOR

//getConsolas
const getConsolas = async ()=>{
    let resp = await axios.get("api/consolas/get"); // peticion hacia api
    return resp.data; //retornar la lista de consolas que estan en la base de datos
};


//crearConsola
const crearConsola =  async (consola)=>{ //arrow functions
    //Estructura de peticion POST al servidor con Axios
    // ruta, objeto y tipo de objeto
    let resp = await axios.post("api/consolas/post", consola, {
        headers: {
            "Content-Type": "application/json"
        }
    });
    return resp.data; //propiedad de axios que trae los datos que manda php
};