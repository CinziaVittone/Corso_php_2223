function CardBase({ titolo, testo }) {
  //console.log(props);
  //console.log(props.titolo);
  //const{titolo, testo} = props; -> destrutturazione di props
  //ma posso scrivere direttamente {{titolo, testo}}
  return (
    //posso tirare fuori direttamente i dati con le graffe
    <div>
      {/* <h3>Titolo</h3> */}
      {/* <h3>{props.titolo}</h3> */}
      <h3>{titolo}</h3>
      {/* <p>testo</p> */}
      <p>{testo}</p>
    </div>
  );
}

export default CardBase;
