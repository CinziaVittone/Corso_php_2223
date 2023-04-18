import logo from "./logo.svg";
import "./App.css";
import CardBase from "./components/CardBase";

function App() {
  const bookList = [
    {
      titolo: "Il giardino delle parole 🎋",
      autore: "Makoto Shinkai",
    },
    {
      titolo: "Kota il cane che vive con noi 🐶",
      autore: "Takashi Murakami",
    },
    {
      titolo: "Il cane che guarda le stelle ✨",
      autore: "Takashi Murakami",
    },
    {
      titolo: "Solanin 🥀",
      autore: "Inio Asano",
    },
  ];

  //trasformo le informazioni in COMPONENTI
  //singolo libro è una card <CardBase></CardBase> analogo a <CardBase/>
  const card_list = bookList.map((book, key) => (
    <CardBase key={key} titolo={book.titolo} testo={book.autore} />
  ));
  //scrittura più estesa
  //const card_list = bookList.map(function (book) {return <CardBase titolo={book.titolo} />});

  return (
    <section>
      <div className="App">
        {/*       
      <CardBase colore ={'red'}titolo={"Il giardino delle parole"}></CardBase>
      <CardBase titolo={"Kota il cane che vive con noi"}></CardBase>
      <CardBase titolo={"Il cane che guarda le stelle"}></CardBase>
      <CardBase titolo={"Solanin"}></CardBase>
       */}
        {card_list}
      </div>
      <hr /> Tag hr per fare il filetto
      <div className="secondo_elenco">
        {bookList.map((book) => (
          <CardBase key={book.titolo} titolo={book.titolo} />
        ))}
      </div>
    </section>
  );
}

export default App;
