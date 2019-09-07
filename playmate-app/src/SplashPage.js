import React from 'react';
import image from './splashpage-photo.jpg'
import './SplashPage.css';

console.log(image);

function SplashPage() {
  return (
    <div className="SplashPage">
      <header className="SplashPage-header">
        <div className="SplashPage-image">
          <img src={image} alt="Stock photo" />
        </div>
        <p>
          This is the splash page.
        </p>
      </header>
    </div>
  );
}

export default SplashPage;
