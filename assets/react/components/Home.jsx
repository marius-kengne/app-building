import React from 'react';
import{ useState, useEffect } from 'react';

import { BrowserRouter as Router,Routes, Route, Link } from 'react-router-dom';

import { createRoot } from "react-dom/client";

import About from './Home';
import Contact from './DetailBuilding';
const container = document.getElementById('app');
import DataTable from 'react-data-table-component';
const root = createRoot(container);

root.render(
    <React.StrictMode>
        <Home/>
    </React.StrictMode>

)

 
const Home = () => {


    
  const [posts, setPosts] = useState([])
  const [loading, setLoading] = useState(true)

  useEffect(() => {
      fetchDatas()
  }, [])

  const fetchDatas = async () => {
      try {
          const response = await fetch('/api/building', {
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

const customStyles = {
  rows: {
      style: {
          minHeight: '42px', // paramétrage des lignes du tableau
          fontSize: '14px',
      },
  },
  headCells: {
      style: {
          paddingLeft: '8px', // Parametrage de l'entête ou header du tableau
          paddingRight: '8px',
          fontSize: '20px',
          
      },
  },
  cells: {
      style: {
          paddingLeft: '6px', // parametrage des cellules ou colones
          paddingRight: '6px',
      },
  },
};

const ExpandedComponent = ({ posts }) => <pre>{JSON.stringify(data, null, 2)}</pre>;

const columns = [
  {
      name: 'ID',
      selector: row => row.id,
  },
  {
      name: 'Nom',
      selector: row => row.nom,
  },
  {
      name: 'ZipCode',
      selector: row => row.zipcode,
  },
];


return (
  <div className='container'>
    <DataTable
      title='Listing des buildings'
      columns={columns}
      data={posts}
      //expandableRows
      responsive="true"
      expandableRowsComponent={ExpandedComponent}
      pagination="true"
      customStyles={customStyles}
  />
  </div>
  
);
}


export default Home;