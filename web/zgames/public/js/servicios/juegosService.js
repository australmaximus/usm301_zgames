
const crearJuego =  async (juego)=>{ //arrow functions
    //Estructura de peticion POST al servidor con Axios
    // ruta, objeto y tipo de objeto
    let resp = await axios.post("api/juegos/post", juego, {
        headers: {
            "Content-Type": "application/json"
        }
    });
    return resp.data; //propiedad de axios que trae los datos que manda php
};

const getJuegos = async ()=>{
    let resp = await axios.get("api/juegos/get");
    return resp.data;
}