const livePrice = {
  async: true,
  scroosDomain: true,
  url: 'https://api.coingecko.com/api/v3/simple/price?ids=bitcoin%2Cethereum%2Cbinancecoin%2C01coin%2C0chain%2C0vix-protocol%2C1inch%2C1doge%2Clitecoin%2Ctether%2Cshiba-cartel&vs_currencies=usd&include_market_cap=true&include_24hr_change=true',
  method: 'GET',
  headers: {},
};

const coinData = [
  {
    coinValue: coinsList('btc_mcap', 'btc_price', 'btc_24h'),
    coinId: 'bitcoin',
  },
  {
    coinValue: coinsList('eth_mcap', 'eth_price', 'eth_24h'),
    coinId: 'ethereum',
  },
  {
    coinValue: coinsList('bnb_mcap', 'bnb_price', 'bnb_24h'),
    coinId: 'binancecoin',
  },
  {
    coinValue: coinsList('ltc_mcap', 'ltc_price', 'ltc_24h'),
    coinId: 'litecoin',
  },
  {
    coinValue: coinsList('shib_mcap', 'shib_price', 'shib_24h'),
    coinId: 'shiba-cartel',
  },
  {
    coinValue: coinsList('1inch_mcap', '1inch_price', '1inch_24h'),
    coinId: '1inch',
  },
];

function coinsList(coins_m_cap, coins_price, hours) {
  const mCapElement = document.getElementById(coins_m_cap);
  const priceElement = document.getElementById(coins_price);
  const hoursElement = document.getElementById(hours);
  return [mCapElement, priceElement, hoursElement];
}

function formatCompactNumber(number) {
  const units = ['', 'K', 'M', 'B', 'T'];
  let index = 0;
  while (number >= 1000 && index < units.length - 1) {
    number /= 1000;
    index++;
  }
  return number.toFixed(1) + units[index];
}

$.ajax(livePrice).done(function (response) {
  coinData.forEach((coin) => {
    const { coinValue, coinId } = coin;

    coinValue[0].innerHTML = formatCompactNumber(
      response[coinId].usd_market_cap
    );
    coinValue[1].innerHTML = formatCompactNumber(response[coinId].usd);
    coinValue[2].innerHTML = Math.floor(response[coinId].usd_24h_change) + '%';
  });
});

const img = document.querySelector('.img__hero');
const nav__items = document.querySelector('.nav__items');
const search_icon = document.querySelector('.search-icon');
const search = document.querySelector('.search-btn');
const menu = document.getElementById('menu');
const close_menu = document.getElementById('close');
const ovly = document.querySelector('.overlay');
//const burger_menu = document.querySelector('.burger__menu');

/*burger_menu.addEventListener('click', () => {
  ovly.classList.toggle('hide-ovly');
  menu.classList.toggle('hide-nav');
})
*/

ovly.addEventListener('click', () => {
  ovly.classList.add('hide-ovly');
  menu.classList.toggle('hide-nav');
});

close_menu.addEventListener('click', () => {
  ovly.classList.add('hide-ovly');
  menu.classList.toggle('hide-nav');
});

search.addEventListener('click', () => {
  img.classList.toggle('hide-sm');
  nav__items.classList.toggle('active');
  search_icon.classList.toggle('hide-sm');
  search_icon.focus();
});
