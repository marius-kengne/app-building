import React from 'react';
import { useLocation } from 'react-router-dom'


import{ useState, useEffect } from 'react';

import { BrowserRouter as Router,Routes, Route, Link } from 'react-router-dom';

import { createRoot } from "react-dom/client";

import About from './Home';
import Contact from './DetailBuilding';
const container = document.getElementById('app');

const root = createRoot(container);



function Piece (){
  
  const [posts, setPosts] = useState([])
  const [loading, setLoading] = useState(true)

  useEffect(() => {
      fetchDatas()
  }, [])

  const fetchDatas = async () => {
      try {
          const response = await fetch('/api/pieces', {
              headers: {
                  'Accept': 'application/json',
              },
          }).then(r => r.json())

          setPosts(JSON.parse(response.datas))
          setLoading(false)
      } catch (error) {
          console.log(error)
      }

      
  }


  console.log(posts);
  const repLogElements = posts.map((repLog, index) => {
      
      return (
        
              <tr data-index={index}>  
                  <td colSpan={3}>{repLog.id}</td>  
                  <td colSpan={3}>{repLog.nom}</td>  
                  <td colSpan={3}>{repLog.nombre_personne}</td>
                  <td colSpan={3}>
                    <center>
                    
                      <ul className=''>
                          <li className="btn btn-secondary" id={repLog.id}>
                              <Link className='text-white' to={`/details-secondary/${repLog.id}`} state={{ from: repLog.id }}> Details</Link>
                          </li>
                          <li className="btn btn-success ml-6" id={repLog.id}>
                              <Link className='text-white' to={`/pieces-building/${repLog.id}`} state={{ from: repLog.id }}>Building</Link>
                          </li>
                          <Routes>
                              <Route exact path={`/details-building/${repLog.id}`} element={< About />}></Route>
                              <Route exact path={`/pieces-building/${repLog.id}`} element={< Contact />}></Route>
                          </Routes>
                      </ul>
                      
                      </center>
                  </td>    
                  
              </tr>  
          
      )
  });

  
  console.log(typeof(posts));
//onClick="detailsBuilding({repLog.id})"
  return (
      <div className="container">   
            <h4 className='mt-4 pl-4'>Listing des pièces</h4><br />
          <table className="table table-bordered table table-striped" id="example">  
              <thead>
                  <tr>  
                      <th colSpan={3}>ID</th>  
                      <th colSpan={3}>Nom</th>  
                      <th colSpan={3}>nombre_personne</th>
                      <th colSpan={1}>Action</th>  
                  </tr> 
              </thead>
               
              <tbody>     
                  {repLogElements}
              </tbody>
              
      
          </table>  
      
      </div>  
  );

}

export default Piece;
