/**
 * ICONS: Chart block
 *
 * Sources:
 *   https://thenounproject.com/search/?q=bar+chart&i=2312138
 *   https://thenounproject.com/srinivas.agra/collection/data-analytics-dark/?i=2312163
 */

const besanIcons = {

  block:
    <svg height='20px' width='20px' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 96 96'>
      <polygon points='65.002,81.921 58.469,81.921 37.532,81.921 30.998,81.921 10.063,81.921 6.25,81.921 6.25,85.086 89.75,85.086 89.75,81.921 85.938,81.921' />
      <rect x='11.563' y='47.454' width='17.936' height='32.967' />
      <rect x='66.502' y='36.569' width='17.936' height='43.852' />
      <rect x='39.032' y='10.914' width='17.937' height='69.507' />
    </svg>,


  // Vertical bar chart placeholder.
  barVertical:
    <svg xmlns='http://www.w3.org/2000/svg' width='1200' height='1200' viewBox='0 0 1200 1200'>
      <rect width='100%' height='100%' fill='#eee'></rect>
      <svg xmlns='http://www.w3.org/2000/svg' x='0' y='0' viewBox='0 0 100 100'>
        <path d='M4.667 12.666H21.333V79H4.667z'></path>
        <path d='M29.333 40H46V79H29.333z'></path>
        <path d='M78.667 29.666H95.333V79H78.667z'></path>
        <path d='M53.999 19.333H70.667V79H53.999z'></path>
        <path d='M5.667 85.334H94.333V87.334H5.667z'></path>
      </svg>
    </svg>,


  // Horizontal bar chart placeholder.
  barHorizontal:
    <svg xmlns='http://www.w3.org/2000/svg' width='1200' height='1200' transform='rotate(90)' viewBox='0 0 1200 1200'>
      <rect width='100%' height='100%' fill='#eee'></rect>
      <svg xmlns='http://www.w3.org/2000/svg' x='0' y='0' viewBox='0 0 100 100'>
        <path d='M4.667 12.666H21.333V79H4.667z'></path>
        <path d='M29.333 40H46V79H29.333z'></path>
        <path d='M78.667 29.666H95.333V79H78.667z'></path>
        <path d='M53.999 19.333H70.667V79H53.999z'></path>
        <path d='M5.667 85.334H94.333V87.334H5.667z'></path>
      </svg>
    </svg>,


  // Pie chart placeholder.
  pie:
    <svg xmlns='http://www.w3.org/2000/svg' width='1200' height='1200' viewBox='0 0 1200 1200'>
      <rect width='100%' height='100%' fill='#eee'></rect>
      <svg xmlns='http://www.w3.org/2000/svg' x='0' y='0' viewBox='0 0 100 100'>
        <path d='M51.326 51.792l6.885 39.892c12.571-2.471 23.174-10.497 29.127-21.412l-36.012-18.48z'></path>
        <path d='M50 92.487c2.12 0 4.203-.161 6.241-.462L49 49.987V7.513C26.027 8.048 7.5 26.888 7.5 49.987c0 23.435 19.065 42.5 42.5 42.5z'></path>
        <path d='M51 7.513v41.864l37.253 19.117A42.242 42.242 0 0092.5 49.988c0-23.1-18.527-41.94-41.5-42.475z'></path>
      </svg>
    </svg>

};

export default besanIcons;
