import './App.css';

function App() {
  return (
    <div className="App">
      <h1>Ты сегодня покормил кота?</h1>
      <div className="row">
        <div className="card">
          <div className="topTitle">Сказочное заморское яство</div>
          <h3>Нямушка</h3>
          <h4>с фуа-гра</h4>
          <div>
            <b>10</b> порций<br />
            мышь в подарок
          </div>
          <div className="size">0,5 <span className="units">кг</span></div>
        </div>
        <div className="underline">Чего сидишь? Порадуй котэ, купи.</div>
      </div>
    </div>
  );
}

export default App;
