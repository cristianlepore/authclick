pragma solidity ^0.4.0;

contract SimpleStorage{
    
    string storeddata;

    function set(string x) public{
        storeddata = x;
    }

    function get() public view returns(string){
        return storeddata;
    }
    
}