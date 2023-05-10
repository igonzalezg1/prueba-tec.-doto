import{_ as f}from"./AuthenticatedLayout-303ba6f4.js";import{D as g}from"./DangerButton-35b34efe.js";import{m as x,T as C,f as n,a as o,u as d,w as s,F as p,o as i,Z as w,b as t,k as _,d as l,p as T,t as r}from"./app-05db4767.js";import{$ as B,S as v}from"./jquery.dataTables-d6132a52.js";import"./ApplicationLogo-7c5c18ca.js";import"./_plugin-vue_export-helper-c27b6911.js";const E=t("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"},"Comentarios",-1),S={class:"py-12"},N={class:"bg-white grid v-screen place-items-center"},M={class:"mt-3 mb-3 flex"},k=t("i",{class:"fa-solid fa-plus-circle"},null,-1),F={class:"bg-white grid v-screen place-items-center"},A={id:"dataTable",class:"table-auto border border-gray-400"},D=t("thead",null,[t("tr",{class:"bg-gray-300"},[t("th",{class:"px-4 py-4"},"#"),t("th",{class:"px-4 py-4"},"Autor"),t("th",{class:"px-4 py-4"},"Correo"),t("th",{class:"px-4 py-4"},"Contenido"),t("th",{class:"px-4 py-4"},"Publicacion"),t("th",{class:"px-4 py-4"},"Fecha de comentario"),t("th",{class:"px-4 py-4"}),t("th",{class:"px-4 py-4"})])],-1),P={class:"border border-gray-400 px-4 py-4"},R={class:"border border-gray-400 px-4 py-4"},V={class:"border border-gray-400 px-4 py-4"},$={class:"border border-gray-400 px-4 py-4"},L={class:"border border-gray-400 px-4 py-4"},O={class:"border border-gray-400 px-4 py-4"},U={class:"border border-gray-400 px-4 py-4"},j={class:"border border-gray-400 px-4 py-4"},z=t("i",{class:"fa-solid fa-trash"},null,-1),K={__name:"Index",props:{comentarios:Object},setup(u){const b=u;x(()=>{B("#dataTable").DataTable({searching:!1,language:{decimal:"",emptyTable:"No hay información",info:"Mostrando _START_ a _END_ de _TOTAL_ Entradas",infoEmpty:"Mostrando 0 to 0 of 0 Entradas",infoFiltered:"(Filtrado de _MAX_ total entradas)",infoPostFix:"",thousands:",",lengthMenu:"Mostrar _MENU_ Entradas",loadingRecords:"Cargando...",processing:"Procesando...",search:"Buscar:",zeroRecords:"Sin resultados encontrados",paginate:{first:"Primero",last:"Ultimo",next:"Siguiente",previous:"Anterior"}}})});const h=C({id:""}),m=(a,y)=>{v.mixin({buttonsStyling:!0}).fire({title:"¿Estás seguro?",text:"No podrás revertir esto!",icon:"warning",showCancelButton:!0,confirmButtonText:"Si, borrar!",cancelButtonText:"No, cancelar!",customClass:{confirmButton:"px-4 py-2 bg-green-800 text-white border rounder-md font-semibold",cancelButton:"px-4 py-2 bg-red-800 text-white border rounder-md font-semibold"},buttonsStyling:!1}).then(c=>{c.isConfirmed&&h.delete(route("comentarios.destroy",a))})};return(a,y)=>(i(),n(p,null,[o(d(w),{title:"Comentarios"}),o(f,null,{header:s(()=>[E]),default:s(()=>[t("div",S,[t("div",N,[t("div",M,[o(d(_),{href:a.route("comentarios.create"),class:"px-4 py-2 bg-gray-800 text-white border rounder-md font-semibold"},{default:s(()=>[k,l(" Crear Publicación")]),_:1},8,["href"])])]),t("div",F,[t("table",A,[D,t("tbody",null,[(i(!0),n(p,null,T(b.comentarios,(e,c)=>(i(),n("tr",{key:e.id},[t("td",P,r(e.id),1),t("td",R,r(e.autor),1),t("td",V,r(e.correo),1),t("td",$,r(e.contenido),1),t("td",L,r(e.publicacion_id),1),t("td",O,r(e.created_at),1),t("td",U,[o(d(_),{href:a.route("comentarios.edit",e.id),class:"px-4 py-2 bg-gray-800 text-white border rounder-md font-semibold"},{default:s(()=>[l("Editar ")]),_:2},1032,["href"])]),t("td",j,[o(g,{onClick:I=>m(e.id,e.titulo),class:"px-4 py-2 bg-red-800 text-white border rounder-md font-semibold"},{default:s(()=>[z,l(" Borrar")]),_:2},1032,["onClick"])])]))),128))])])])])]),_:1})],64))}};export{K as default};