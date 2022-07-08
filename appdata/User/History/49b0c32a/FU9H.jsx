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
        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 42.6762V468C0 474.627 5.37259 480 12 480H308C314.627 480 320 474.627 320 468V12C320 5.37258 314.627 0 308 0H42.6762L0 42.6762Z" fill="#F2F2F2"/>
        <path d="M0 42.6762L-2.82843 39.8478L-4 41.0193V42.6762H0ZM42.6762 0V-4H41.0193L39.8478 -2.82843L42.6762 0ZM4 468V42.6762H-4V468H4ZM12 476C7.58173 476 4 472.418 4 468H-4C-4 476.837 3.16345 484 12 484V476ZM308 476H12V484H308V476ZM316 468C316 472.418 312.418 476 308 476V484C316.837 484 324 476.837 324 468H316ZM316 12V468H324V12H316ZM308 4C312.418 4 316 7.58172 316 12H324C324 3.16344 316.837 -4 308 -4V4ZM42.6762 4H308V-4H42.6762V4ZM39.8478 -2.82843L-2.82843 39.8478L2.82843 45.5046L45.5046 2.82843L39.8478 -2.82843Z" fill="#1698D9" mask="url(#path-1-inside-1_47_108)"/>
      </svg>

    </div>
  );
}

export default App;
