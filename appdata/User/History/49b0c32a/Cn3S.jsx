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

      <svg width="320" height="480" viewBox="0 0 320 480" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M0 42.6762V468C0 474.627 5.37259 480 12 480H308C314.627 480 320 474.627 320 468V12C320 5.37258 314.627 0 308 0H42.6762L0 42.6762Z"/>
        </svg>

    </div>
  );
}

export default App;
