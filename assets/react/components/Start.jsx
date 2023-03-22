//import logo from './logo.svg';


import React, { Component } from 'react';
import { BrowserRouter as Router,Routes, Route, Link } from 'react-router-dom';
import Home from './Home';
import Piece from './Piece';
import Organisation from './Organisation';
import Contact from './DetailBuilding';
import DetailBuilding from './DetailBuilding';


sessionStorage.setItem('clé', 'valeur');

class Start extends Component {

  
render() {
    return (
      
      <Router>
        
          <nav className="app-header navbar navbar-expand-lg  text-white bg-dark navbar-nav ms-auto mb-lg-0" >
            <a class="navbar-brand m-2 text-white" href="#">IVS-MANAGER</a>
            <button className="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span className="navbar-toggler-icon"></span>
            </button>
            <div className="collapse navbar-collapse pull-left text-white" id="navbarNav">
                <ul className="navbar-nav">
                    <li className="nav-item active text-white">
                        <Link className='nav-link text-white' to="/">Home</Link> <span className="sr-only"></span>
                    </li>
                    <li className="nav-item">
                        <Link className='nav-link text-white' to="/building">Building</Link>
                    </li>
                    <li className="nav-item">
                        <Link className='nav-link text-white' to="/pieces">Pieces</Link>
                    </li>
                    <li className="nav-item">
                        <Link className='nav-link text-white' to="/organisation">Organisation</Link>
                    </li>
                </ul>
            </div>
          
          </nav>
          <br />
          <h3 className='mt-4 pl-4'> GESTION DES BUILDINGS✅</h3><br />
          <Routes>
              <Route exact path='/' element={< Organisation />}></Route>
              <Route exact path='/building' element={< Home />}></Route>
              <Route exact path='/pieces' element={< Piece/>}></Route>
              <Route exact path='/organisation' element={< Organisation />}></Route>
          </Routes>
      
      </Router>
    );
}

}

export default Start;
