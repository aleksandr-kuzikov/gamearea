import './App.css';

function App() {
  return (
    <div className="App">
      <h1>Ты сегодня покормил кота?</h1>
      <div className="row">
        <div className="card">
          <span className="topTitle">Сказочное заморское яство</span>
          <h3>Нямушка</h3>
          <h5>с фуа-гра</h5>
          <span>
            10 порций<br />
            мышь в подарок
          </span>
          <div className="size">0,5 <span className="units">кг</span></div>
        </div>
        <div className="underline">Чего сидишь? Порадуй котэ, купи.</div>
      </div>
    </div>
  );
}

export default App;
