import{j as u,o as t,e,b as d,u as p,a as s,F as r,h as _,Z as h,t as o}from"./app-470e78aa.js";const b={class:"relative overflow-x-auto m-7"},x={class:"w-full text-sm text-left text-gray-500"},y=s("thead",{class:"text-xs text-gray-700 uppercase bg-gray-50"},[s("tr",{class:"bg-white border"},[s("th",{scope:"col",class:"px-6 py-3"}," Foto "),s("th",{scope:"col",class:"px-6 py-3"}," Nama Kandidat "),s("th",{scope:"col",class:"px-6 py-3"}," Perolehan Suara ")])],-1),f={scope:"row",class:"px-6 py-4 border w-40"},g=["src"],w={scope:"row",class:"px-6 py-4 border"},i=s("hr",null,null,-1),v=s("p",null,[s("b",null,"Alamat")],-1),j=s("hr",null,null,-1),k=s("p",null,[s("b",null,"Visi")],-1),B=s("hr",null,null,-1),F=s("p",null,[s("b",null,"Misi")],-1),N={class:"px-6 py-4 text-center border font-bold"},M={__name:"Show",props:{models:{type:Object,default:{}},attributes:{type:Object,default:{}}},setup(n){return u(()=>{window.print()}),(S,V)=>{var a;return t(),e(r,null,[d(p(h),{title:(a=n.attributes)==null?void 0:a.title},null,8,["title"]),s("div",b,[s("table",x,[y,s("tbody",null,[(t(!0),e(r,null,_(n.models,(l,c)=>(t(),e("tr",{class:"bg-white border-b",key:c},[s("th",f,[s("img",{src:l==null?void 0:l.formattedPhotoAt,class:"mx-auto w-32 h-44 bg-gray-100 object-cover rounded-2xl"},null,8,g)]),s("th",w,[s("p",null,[s("b",null,o(l==null?void 0:l.name),1)]),i,v,s("p",null,o(l==null?void 0:l.address),1),j,k,s("p",null,o(l==null?void 0:l.vision),1),B,F,s("p",null,o(l==null?void 0:l.mission),1)]),s("td",N,o(l==null?void 0:l.number_of_votes),1)]))),128))])])])],64)}}};export{M as default};