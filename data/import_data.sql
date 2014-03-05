use SlabImgDB;
go
delete from [dbo].[Slabs]
go

-- slabs
insert into [dbo].[Slabs](SlabId, Container) 
select id_slab, container from [192.168.1.75].[erp].[dbo].[v_slab]  