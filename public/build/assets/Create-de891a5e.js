import{_ as k}from"./HomeLayout-54f97c06.js";import{_ as y}from"./Button-1622b576.js";import{_ as V}from"./ButtonLink-66ea5079.js";import{T as $,o as a,c as n,w as o,a as e,t as l,g as r,b as p,f as B,e as w,h as C,n as d,F as N}from"./app-470e78aa.js";import P from"./ModalSelect-798c17ac.js";import j from"./ModalManySelect-fb1ca7f1.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./DialogModal-0ae1111e.js";import"./global-83223cf1.js";const A={class:"text-gray-700 body-font border-t border-gray-200 bg-gray-50"},O={class:"container px-5 py-24 mx-auto"},S={class:"flex flex-col text-center w-full mb-20"},T=e("h1",{class:"sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900"},"Kandidat",-1),F={class:"lg:w-2/3 mx-auto leading-relaxed text-base"},M={class:"lg:w-2/3 mx-auto leading-relaxed text-base"},z={class:"font-bold text-red-700"},D=e("span",{class:"relative flex h-3 w-3"},[e("span",{class:"animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-400 opacity-75"}),e("span",{class:"relative inline-flex rounded-full h-3 w-3 bg-yellow-500"})],-1),E={class:"flex flex-wrap -m-2"},H={class:"flex-grow text-center"},K={class:"w-full mb-7"},L=["src"],W={class:"w-full"},tt={__name:"Create",props:{models:{type:Object,default:{}},attributes:{type:Object,default:{}}},setup(s){return $({_method:"POST",token:""}),(v,q)=>(a(),n(k,{title:"Welcome"},{default:o(()=>{var c,u,i,f,_,b,h,x;return[e("section",A,[e("div",O,[e("div",S,[T,e("p",F,l((u=(c=s.attributes)==null?void 0:c.vote)==null?void 0:u.name),1),e("p",M,[r("Anda harus memilih setidak nya "),e("span",z,l((f=(i=s.attributes)==null?void 0:i.vote)==null?void 0:f.number_of_choices)+" orang",1),r(" kandidat")]),((b=(_=s.attributes)==null?void 0:_.vote)==null?void 0:b.number_of_choices)>1?(a(),n(j,{attributes:{items:(h=s.attributes)==null?void 0:h.vote_session,store_url:(x=s.attributes)==null?void 0:x.store_url},key:Math.floor(Math.random()*1e3)},{default:o(()=>[p(y,{type:"button",class:"mb-2",button_type:"danger"},{default:o(()=>{var t;return[r(" Voting Pilihan Anda Sebanyak "+l((t=s.attributes)==null?void 0:t.vote_session_count)+"  ",1),D]}),_:1})]),_:1},8,["attributes"])):B("",!0)]),e("div",E,[(a(!0),w(N,null,C(s.models,(t,m)=>{var g;return a(),w("div",{key:m,class:"p-2 lg:w-1/4 md:w-1/2 w-full"},[e("div",{class:d(["h-full flex items-center border-gray-200 border p-4 rounded-lg",t==null?void 0:t.bg])},[e("div",H,[e("div",K,[e("img",{alt:"team",class:"mx-auto w-32 h-44 bg-gray-100 object-cover rounded-2xl",src:t==null?void 0:t.formattedPhotoAt},null,8,L)]),e("h2",{class:d(["title-font font-bold font-medium mb-2",t==null?void 0:t.h1])},l(t==null?void 0:t.name),3),e("p",{class:d(["title-font font-medium mb-7",t==null?void 0:t.h2])},l(t==null?void 0:t.address),3),e("div",W,[(t==null?void 0:t.selected)==!0?(a(),n(V,{key:0,href:v.route("home.voting.deletechoice",{id:t==null?void 0:t.id}),button_name:"warning"},{default:o(()=>[r(" Hapus ")]),_:2},1032,["href"])):(a(),n(P,{attributes:{item:t,store_url:(g=s.attributes)==null?void 0:g.store_url},class:"mr-3",key:m},{default:o(()=>[p(y,{type:"button",class:"mb-2",button_type:"primary"},{default:o(()=>[r("Pilih")]),_:1})]),_:2},1032,["attributes"]))])])],2)])}),128))])])])]}),_:1}))}};export{tt as default};
